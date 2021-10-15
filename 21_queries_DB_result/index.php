<?php
declare(strict_types=1);

include 'functions/connectToDb.php';
include 'functions/isRegisteredUser.php';

$isRegisteredUser = false;
$errors = [];

if (isset($_POST['login']) && $_POST['login'] === 'Увійти') {
    $login = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (($login !== '') && ($password !== '')) {

        $param = include 'configurations/config.php';

        try {
            $connection = connectToDb($param);
        } catch(Exception $e) {
            $errors[] = $e->getMessage();
        }

        if (empty($errors)) {
            $isRegisteredUser = isRegisteredUser($connection, $login, $password);

            if (!$isRegisteredUser) {
                $errors[] = 'Не вірні облікові дані';
            }
        }
    }
}

require 'template/login.php';

$connection = null;
