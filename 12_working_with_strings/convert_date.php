<?php

$date = '31-12-2020';

$convertedDate = date('Y.m.d', strtotime($date));

[$d, $m, $y] = explode('-', $date);

$convertedDateStr = implode('.', [$y, $m, $d]);

echo 'З використанням функції date(): ' . $convertedDate . PHP_EOL;
echo 'З використанням строкових функцій: ' . $convertedDateStr . PHP_EOL;
