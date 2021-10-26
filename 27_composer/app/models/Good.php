<?php

namespace Shop\models;

use PDO;
use Shop\DBClient;

class Good
{
    private PDO $connection;

    public function __construct()
    {
        $db = DBClient::getInstance();
        $this->connection = $db->getConnection();
    }

    public function getAll(): array
    {
        $stmt = $this->connection->prepare("SELECT * FROM goods");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}