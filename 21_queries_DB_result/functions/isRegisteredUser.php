<?php

function isRegisteredUser(PDO $connection, string $username, string $password): bool
{
    $stmt = $connection->prepare('SELECT * FROM users WHERE username = :username AND password = :password');

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
    $result = $stmt->fetch();

    return !empty($result);
}
