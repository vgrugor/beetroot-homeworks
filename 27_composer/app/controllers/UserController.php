<?php

namespace Shop\Controllers;

use Shop\Validations\UserValidator;
use Shop\Models\User;

class UserController
{
    public function __construct()
    {
        //echo 'Run UserController';
    }

    public function login(): void
    {
        $login = $_POST['username']  ?? null;
        $password = $_POST['password'] ?? null;
        $errors = [];

        if ($login !== null) {
            $validator = new UserValidator();
            $validator->validateUser($login, $password);

            $errors = $validator->getErrors();

            if(empty($errors)) {
                $user = new User();
                $userFromDB = $user->getUserByLogin($login);

                $this->setSession($userFromDB['id'], $login);
                header('Location: /');
            }
        }

        include '../views/login.php';
    }

    private function setSession(int $id, string $login): void
    {
        $_SESSION['user'] = ['id' => $id, 'login' => $login];
    }

    public function logout(): void
    {
        $_SESSION = [];
        header('Location: /');
    }

    public function registration(): void
    {
        $errors = [];
        $login = $_POST['login'] ?? null;
        $password = $_POST['password'] ?? null;
        $verifyPassword = $_POST['password2'] ?? null;
        $email = $_POST['email'] ?? null;

        if ($login !== null && $password !== null) {
            $validator = new UserValidator();
            $validator->validateLogin($login);
            $validator->validatePassword($password, $verifyPassword);
            $validator->validateEmail($email);

            $errors = $validator->getErrors();

            if (empty($errors)) {
                $user = new User();
                $userIsAdded = $user->addNewUser($login, $password, $email);

                if ($userIsAdded) {
                    $userFromDB = $user->getUserByLogin($login);
                    $this->setSession($userFromDB['id'], $userFromDB['username']);

                    header('Location: /');
                }
            }
        }

        include '../views/registration.php';
    }
}