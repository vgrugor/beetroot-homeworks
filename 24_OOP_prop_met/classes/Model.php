<?php

abstract class Model
{
    protected ?PDO $connection;

    /**
     * @param $params
     * @throws Exception
     */
    public function __construct($params)
    {
        try {
            $this->connect($params);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private function connect($params): void
    {
        $dns = "$params[driver]:host=$params[host];port=$params[port];dbname=$params[dbname];charset=utf8";

        $this->connection = new PDO($dns, $params['user'], $params['password']);
    }

    protected function getConnect(): PDO
    {
        return $this->connection;
    }

    public function __destruct()
    {
        $this->connection = null;
    }
}
