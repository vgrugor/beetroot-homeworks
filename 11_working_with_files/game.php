<?php

$randomNumber = random_int(1, 100);

file_put_contents('gameOptions.txt', $randomNumber, LOCK_EX);

$continueGame = true;

while ($continueGame) {
    echo 'Відгадайте число від 1 до 100: ';
    fscanf(STDIN, "%d\n", $enteredNumber);

    $enteredNumberIsCorrect = ((int)$enteredNumber >= 1) && ((int)$enteredNumber <= 100);

    if (!$enteredNumberIsCorrect) {
        echo 'Введено не коректне число' . PHP_EOL;
        continue;
    }

    if ($randomNumber === $enteredNumber) {
        echo '*** Вітаю!!! ви відгадали число: ' . $randomNumber . ' ***' . PHP_EOL;
        $continueGame = false;
        break;
    }

    if ($randomNumber > $enteredNumber) {
        echo 'Загадане число більше введеного' . PHP_EOL;
    }

    if ($randomNumber < $enteredNumber) {
        echo 'Загадане число менше введеного' . PHP_EOL;
    }
}

