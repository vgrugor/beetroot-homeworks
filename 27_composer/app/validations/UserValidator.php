<?php

namespace Shop\Validations;

use Shop\Models\User;

class UserValidator
{
    private const MIN_LENGTH_LOGIN = 4;
    private const MAX_LENGTH_LOGIN = 12;
    private const MIN_LENGTH_PASSWORD = 4;
    private const MAX_LENGTH_PASSWORD = 12;
    private array $errors = [];

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function validateLogin(string $login): void
    {
        $lenLogin = strlen($login);
        if ($lenLogin < self::MIN_LENGTH_LOGIN || $lenLogin > self::MAX_LENGTH_LOGIN) {
            $this->errors[] = 'Довжина логыну маэ бути выд ' . self::MIN_LENGTH_LOGIN . ' до ' . self::MAX_LENGTH_LOGIN . 'символыв';
        }

        if ($this->userAlreadyExists($login)) {
            $this->errors[] = 'Користувач з таким логіном вже зареєстрований';
        }
    }

    private function userAlreadyExists(string $login): bool
    {
        $user = new User();

        return !empty($user->getUserByLogin($login));
    }

    public function validatePassword(string $password, string $verifyPassword): void
    {
        $lenPassword = strlen($password);

        if ($lenPassword < self::MIN_LENGTH_PASSWORD || $lenPassword > self::MAX_LENGTH_PASSWORD)
        {
            $this->errors[] = 'Довжина пароля маэ бути выд ' . self::MIN_LENGTH_PASSWORD . ' до ' . self::MAX_LENGTH_PASSWORD . 'символыв';
        }

        $this->validateVerifyPassword($password, $verifyPassword);
    }

    private function validateVerifyPassword(string $password, string $verifyPassword): void
    {
        if ($password !== $verifyPassword) {
            $this->errors[] = 'Паролі не співпадають';
        }
    }

    public function validateEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'Некоректний email';
        }
    }

    public function validateUser(string $login, string $password): void
    {
        $user = new User();
        $userFromDB = $user->getUserByLogin($login);

        if (!$userFromDB || !password_verify($password, $userFromDB['password'])) {
            $this->errors[] = 'Користувача не знайдено!';
        }
    }
}