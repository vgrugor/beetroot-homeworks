<?php

namespace Shop\Models;

use PDO;
use Shop\DBClient;

class ShoppingCart
{
    private const START_QUANTITY = 1;
    private PDO $connection;

    public function __construct()
    {
        $db = DBClient::getInstance();
        $this->connection = $db->getConnection();
    }

    public function addNewGood(int $goodId, int $userId): bool
    {
        $stmt = $this->connection->prepare('INSERT INTO shopping_cart (good_id, user_id, quantity) VALUES (?, ?, ?)');

        return $stmt->execute([$goodId, $userId, self::START_QUANTITY]);
    }

    public function getAll(int $userId): array
    {
        $stmt = $this->connection->prepare(
            'SELECT goods.title, 
            shopping_cart.quantity * goods.price as total_sum, 
            shopping_cart.quantity,
            shopping_cart.good_id
            FROM shopping_cart
            INNER JOIN goods ON goods.id = shopping_cart.good_id
            WHERE user_id = ?'
        );

        $stmt->execute([$userId]);
        $result = $stmt->fetchAll();

        return $result ?: [];
    }

    /**
     * @param int $goodId
     * @param int $userId
     */
    public function add(int $goodId, int $userId): bool
    {
        $quantity = $this->getQuantity($goodId, $userId);

        if ($quantity === 0) {
            $result = $this->addNewGood($goodId, $userId);
        } else {
            $quantity++;
            $result = $this->changeQuantity($goodId, $userId, $quantity);
        }

        return $result;
    }

    /**
     * @param $goodId
     * @return int
     */
    private function getQuantity(int $goodId, int $userId): int
    {
        $stmt = $this->connection->query("SELECT quantity FROM shopping_cart WHERE good_id = $goodId AND user_id = $userId");

        return $stmt->fetchColumn() ?? 0;
    }

    /**
     * @param int $goodId
     * @param int $quantity
     */
    private function changeQuantity(int $goodId, int $userId, int $quantity): bool
    {
        $stmt = $this->connection->prepare("UPDATE shopping_cart 
            SET quantity = ? 
            WHERE good_id = ? AND
            user_id = $userId"
        );

        return $stmt->execute([$quantity, $goodId]);
    }

    /**
     * @param $goodId
     */
    public function deleteGood(int $goodId, int $userId): void
    {
        $quantity = $this->getQuantity($goodId, $userId);

        if ($quantity === 1) {
            $this->deleteAllGood($goodId, $userId);
        } else {
            $quantity--;
            $this->changeQuantity($goodId, $userId, $quantity);
        }
    }

    /**
     * @param int $goodId
     */
    public function deleteAllGood(int $goodId): void
    {
        $stmt = $this->connection->prepare("DELETE FROM shopping_cart WHERE good_id = ?");

        $stmt->execute([$goodId]);
    }
}