<?php
declare(strict_types=1);

include 'functions/validation.php';
include 'functions/connectToDb.php';
include 'functions/addNewUser.php';

$errors = [];
$isAddedUser = false;

if (isset($_POST['registration']) && ($_POST['registration'] === 'Зареєструватися')) {
    $userData['login'] = $_POST['login'] ?? null;
    $userData['password'] = $_POST['password'] ?? null;
    $userData['password2'] = $_POST['password2'] ?? null;
    $userData['email'] = $_POST['email'] ?? null;
    $userData['age'] = $_POST['age'] ?? null;

    $errors = validation($userData);

    if (empty($errors)) {

        $params = include 'configurations/config.php';

        try {
            $connection = connectToDb($params);
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
        }

        if (empty($errors)) {
            $isAddedUser = addNewUser($connection, $userData);
        }
    }
}

include 'template/registration.php';

$connection = null;
