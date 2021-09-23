<?php

//***************************_параметри_********************************************
const USERS_FILE_NAME = __DIR__ . '/usersList.json';
const USER_LOGIN = 'logJulia';
const USER_PASSWORD = '12345';

//***************************_код для виконання_************************************
$users = getUsersFromJsonFile(USERS_FILE_NAME);

if (!is_array($users)) {
    die($users);
}

$user = getUserInfo(USER_LOGIN, USER_PASSWORD, $users);

if (is_array($user)) {
    var_export($user);
    die();
}

echo $user . PHP_EOL;

//***************************_Оголошення функцій_***********************************

function getUserInfo($login, $password, $usersList)
{
    foreach ($usersList as $user) {
        //щоб не було нотісів, через невірно створений json
        if (!isset($user['login'], $user['password'])) {
            continue;
        }

        $isCorrectLogin = $user['login'] === $login;
        $isCorrectPassword = $user['password'] === $password;
        if ($isCorrectLogin && $isCorrectPassword) {
            return $user;
        }
    }
    return 'Користувача не знайдено!';
}


function getUsersFromJsonFile($fileName)
{
    if (!file_exists($fileName)) {
        return "Не вдалося знайти файл $fileName";
    }

    $fileContent = file_get_contents($fileName);

    if (!$fileContent) {
        return "Не вдалося прочитати файл $fileName";
    }

    try {
        $users = json_decode($fileContent, true, 512, JSON_THROW_ON_ERROR);
    } catch (JsonException $error) {
        return "Не вдалося декодувати json з файлу $fileName";
    }

    return empty($users) ? 'Отримано пустий масив' : $users;
}
