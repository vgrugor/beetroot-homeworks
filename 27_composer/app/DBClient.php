<?php

namespace Shop;

use PDO;
use PDOException;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class DBClient
{
    private static $instance;
    private PDO $connection;
    private array $params;

    private function __construct()
    {
        $this->params = include '../config/config.php';

        $dns = $this->params['driver']
            . ':host=' . $this->params['host']
            . ';port=' . $this->params['port']
            . ';dbname=' . $this->params['dbname']
            . ';charset=UTF8';

        try {
            $this->connection = new PDO($dns, $this->params['user'], $this->params['password']);
        } catch (PDOException $e) {
            $name = date('d-m-Y');

            $log = new Logger('PDO');
            $log->pushHandler(new StreamHandler("../logs/$name.log", Logger::ERROR));

            $log->error($e->getMessage());
        }
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}