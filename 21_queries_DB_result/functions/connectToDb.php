<?php

/**
 * @param array $params
 * @return PDO
 * @throws Exception
 */
function connectToDb(array $params): PDO
{
    $dns = "$params[driver]:host=$params[host];port=$params[port];dbname=$params[dbname]";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        $pdo = new PDO($dns, $params['user'], $params['password']);
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }

    return $pdo;
}
