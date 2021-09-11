<?php

$users[3] = ["name" => "Vlad", "email" => "Vlad@test.com"];;
$users[18] = ["name" => "Igor", "email" => "Igor@test.com"];;
$users[15] = ["name" => "Ivan", "email" => "Ivan@test.com"];;
$users[9] = ["name" => "Petro", "email" => "Petro@test.com"];;
$users[7] = ["name" => "Sergii", "email" => "Sergii@test.com"];;

krsort($users);

$totalUsers = count($users);
$maxIdUser = reset($users);
$afterMaxIdUser = next($users);
$minIdUser = end($users);
$beforeMinIdUser = prev($users);
$minId = array_search($minIdUser, $users);

/*
//вариант 2
$arrayId = array_keys($users);
$minId = min($arrayId);
*/

echo 'Всього користувачів ' . $totalUsers . PHP_EOL;
echo 'Відсортований масив: ' . PHP_EOL;
var_export($users);
echo PHP_EOL . 'Користувач з максимальним id: ' . $maxIdUser['name'] . ' - ' . $maxIdUser['email'] . PHP_EOL;
echo 'Користувач з мінімальним id: ' . $minIdUser['name'] . ' - ' . $minIdUser['email'] . PHP_EOL;
echo 'Користувач з id після максимального: ' . $afterMaxIdUser['name'] . ' - ' . $afterMaxIdUser['email'] . PHP_EOL;
echo 'Користувач з id перед мінімальним: ' . $beforeMinIdUser['name'] . ' - ' . $beforeMinIdUser['email'] . PHP_EOL;

unset($users[$minId]);
echo 'Масив після видалення мінімального id: ' . PHP_EOL;
var_export($users);
