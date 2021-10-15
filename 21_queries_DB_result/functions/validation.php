<?php

function validation(array $userData): array
{
    $errors = [];

    if ($userData['login'] === '' || strlen($userData['login']) > 255) {
        $errors[] = 'Логін не може бути пустим або довшим за 255 символів';
    }

    if ($userData['password'] === '' || strlen($userData['password']) > 32) {
        $errors[] = 'Пароль не може бути пустим або довшим за 255 символів';
    }

    if ($userData['password2'] !== $userData['password']) {
        $errors[] = 'Паролі не співпадають';
    }

    if ($userData['email'] === '' || strlen($userData['email']) > 255 ) {
        $errors[] = 'email не може бути пустим або довшим за 255 символів';
    }

    return $errors;
}
