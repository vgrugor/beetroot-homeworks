<?php

spl_autoload_register(function ($className) {
    include_once $className . '.php';
});

$worker1 = new Worker('Иван', 25, 1000);
$worker2 = new Worker('Вася', 26, 2000);

$sumSalary = $worker1->getSalary() + $worker2->getSalary();

echo 'Зарплата ' . $sumSalary . PHP_EOL;

