<?php

$isCorrectPassword = false;

echo 'Введіть пароль (від 8 до 11 символів): ';

while (!$isCorrectPassword) {
    $password = trim(fgets(STDIN));

    if (strlen($password) > 7 && strlen($password) < 12) {
        die('Операція завершена успішно. Пароль збережено.' . PHP_EOL);
    }

    echo 'Пароль не відповідає вимогам по довжині (від 8 до 11 символів). Введіть пароль ще раз: ';
}
