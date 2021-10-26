<?php

namespace Shop\Models;

use PDO;
use Shop\DBClient;

class User
{
    private PDO $connection;

    public function __construct()
    {
        $db = DBClient::getInstance();
        $this->connection = $db->getConnection();
    }

    public function getUserByLogin(string $login): array
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$login]);
        $result = $stmt->fetch();

        return $result ?: [];
    }

    public function addNewUser(string $login, string $password, string $email): bool
    {
        $stmt = $this->connection->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $password = password_hash($password, PASSWORD_DEFAULT);

        return $stmt->execute([$login, $password, $email]);
    }
}