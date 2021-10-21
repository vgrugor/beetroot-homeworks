<?php

final class ShoppingCart extends Model
{
    private const START_QUANTITY = 1;
    private string $table = 'shopping_cart';
    private string $fieldsNames = 'good_id, user_id, quantity, ordered_at';
    private string $fieldQuantity = 'quantity';

    /**
     * @param int $goodId
     * @param int $userId
     */
    public function addGood(int $goodId, int $userId): void
    {
        $quantity = $this->getQuantity($goodId);

        if ($quantity === 0) {
            $this->addNewGood($goodId, $userId);
        } else {
            $quantity++;
            $this->changeQuantity($goodId, $quantity);
        }
    }

    /**
     * @param $goodId
     * @return int
     */
    private function getQuantity($goodId): int
    {
        $stmt = $this->connection->query("SELECT quantity FROM $this->table WHERE good_id = $goodId");

        return $stmt->fetchColumn() ?? 0;
    }

    /**
     * @param int $goodId
     * @param int $userId
     */
    private function addNewGood(int $goodId, int $userId): void
    {
        $stmt = $this->connection->prepare("INSERT INTO $this->table ($this->fieldsNames) VALUES (?, ?, ?, ?)");

        $stmt->execute([$goodId, $userId, self::START_QUANTITY, null]);
    }

    /**
     * @param int $goodId
     * @param int $quantity
     */
    private function changeQuantity(int $goodId, int $quantity): void
    {
        $stmt = $this->connection->prepare("UPDATE $this->table 
            SET $this->fieldQuantity = ? 
            WHERE good_id = ?"
        );

        $stmt->execute([$quantity, $goodId]);
    }

    /**
     * @param $goodId
     */
    public function deleteGood($goodId): void
    {
        $quantity = $this->getQuantity($goodId);

        if ($quantity === 1) {
            $this->deleteAllGood($goodId);
        } else {
            $quantity--;
            $this->changeQuantity($goodId, $quantity);
        }
    }

    /**
     * @param int $goodId
     */
    public function deleteAllGood(int $goodId): void
    {
        $stmt = $this->connection->prepare("DELETE FROM $this->table WHERE good_id = ?");

        $stmt->execute([$goodId]);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $stmt = $this->connection->query(
            "SELECT goods.id, goods.title, goods.price*shopping_cart.quantity as total_sum, shopping_cart.quantity 
            FROM $this->table 
            LEFT JOIN goods ON goods.id = shopping_cart.good_id"
        );

        return $stmt->fetchAll();
    }
}