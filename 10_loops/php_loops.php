<?php

$users[] = ["name" => "Vlad", "email" => "Vlad@test.com", 'lang' => 'en'];
$users[] = ["name" => "Igor", "email" => "Igor@test.com", 'lang' => 'ru'];
$users[] = ["name" => "Anna", "email" => "Ivan@test.com", 'lang' => 'ua'];
$users[] = ["name" => "Petro", "email" => "Petro@test.com", 'lang' => 'fr'];
$users[] = ["name" => "Anna", "email" => "Sergii@test.com", 'lang' => 'ru'];
$users[] = ["name" => "Vlad", "email" => "Vlad@test.com", 'lang' => 'en'];
$users[] = ["name" => "Iryna", "email" => "Igor@test.com", 'lang' => 'ru'];
$users[] = ["name" => "Petro", "email" => "Ivan@test.com", 'lang' => 'ua'];
$users[] = ["name" => "Svitlana", "email" => "Petro@test.com", 'lang' => 'fr'];
$users[] = ["name" => "Maryna", "email" => "Sergii@test.com", 'lang' => 'ru'];
$users[] = ["name" => "Petro", "email" => "Vlad@test.com", 'lang' => 'en'];
$users[] = ["name" => "Igor", "email" => "Igor@test.com", 'lang' => 'ru'];
$users[] = ["name" => "Igor", "email" => "Ivan@test.com", 'lang' => 'ua'];
$users[] = ["name" => "Petro", "email" => "Petro@test.com", 'lang' => 'fr'];
$users[] = ["name" => "Sergii", "email" => "Sergii@test.com", 'lang' => 'ru'];


/*************************_кількість_повторів_імені_**************************************/

$countNames = [];

foreach ($users as $user) {
    isset($countNames[$user['name']]) ? $countNames[$user['name']]++ : $countNames[$user['name']] = 1;
}

foreach ($countNames as $name => $countName) {
    if ($countName > 1) {
        echo "Ім'я " . $name . ' зустрічається ' . $countName . ' рази' . PHP_EOL;
    }
}


/***********************_масиви_з_користувачами_на_різних_мовах_***************************/

$sortedUsers = [];
$languages = [];
$uniqueLanguages = [];

foreach ($users as $user) {
    $sortedUsers[$user['lang']][] = $user;
    $languages[] = $user['lang'];
}

extract($sortedUsers);

$uniqueLanguages = array_unique($languages);

foreach ($uniqueLanguages as $language) {
    echo PHP_EOL . 'Користувачі з мовою ' . $language . PHP_EOL;
    var_export($$language);
}


/***************************_масив_у_зворотньому_порядку_**********************************/

$reverseUsers = [];

for ($i = (count($users) - 1); $i >= 0; $i--) {
    $reverseUsers[] = $users[$i];
}

echo PHP_EOL . 'Масив користувачів у зворотньому порядку ' . PHP_EOL;
var_export($reverseUsers);
