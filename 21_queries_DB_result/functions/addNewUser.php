<?php

function addNewUser(PDO $pdo, array $userInfo): int
{
    $stmt = $pdo->prepare(
        "INSERT INTO `users`(`username`, `password`, `email`, `age`) VALUES (:login, :password, :email, :age)"
    );

    $stmt->bindParam(':login', $userInfo['login']);
    $stmt->bindParam(':password', $userInfo['password']);
    $stmt->bindParam(':email', $userInfo['email']);
    $stmt->bindParam(':age', $userInfo['age']);

    return $stmt->execute();
}