<?php

//масив користувачів
$users[3] = ["name" => "Vlad", "email" => "Vlad@test.com", 'lang' => 'en'];
$users[18] = ["name" => "Igor", "email" => "Igor@test.com", 'lang' => 'ru'];
$users[15] = ["name" => "Ivan", "email" => "Ivan@test.com", 'lang' => 'ua'];
$users[9] = ["name" => "Petro", "email" => "Petro@test.com", 'lang' => 'fr'];
$users[7] = ["name" => "Sergii", "email" => "Sergii@test.com", 'lang' => 'ru'];

//масив мов
$lang['ru'] = 'Привет, пользователь!';
$lang['en'] = 'Hello, user!';
$lang['ua'] = 'Привіт, користувач!';
$lang['fr'] = 'Bonjour, utilisateur';
$lang['de'] = 'Hallo, Benutzer';

krsort($users);

$maxIdUser = reset($users);
$minIdUser = end($users);

//виводимо привітання
if ($maxIdUser['lang'] === $minIdUser['lang']) {
    echo $lang[$maxIdUser['lang']] . PHP_EOL;
} else {
    echo $lang[$maxIdUser['lang']] . PHP_EOL .
        $lang[$minIdUser['lang']] . PHP_EOL;
}
