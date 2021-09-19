<?php

$str = '1a2b3c4b5d6e7f8g9h0';
$convertedStr = '';

for ($i = 0; $i < strlen($str); $i++) {
    $convertedStr .= is_numeric($str[$i]) ? '' : $str[$i];
}

echo "Строчка без чисел через for(): $convertedStr" . PHP_EOL;

//Я б краще робив через регулярні вирази

$newStr = preg_replace('/[0-9]/', '', $str);

echo "Строчка без чисел через регулярні вирази: $newStr" . PHP_EOL;
