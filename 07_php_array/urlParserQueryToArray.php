<?php

$parseUrl = parse_url($argv[1]);

//якщо елемент масиву існує, то підготовлюємо його для виводу
$scheme = isset($parseUrl['scheme']) ? 'scheme: ' . $parseUrl['scheme'] . PHP_EOL : '';
$host = isset($parseUrl['host']) ? 'host: ' . $parseUrl['host'] . PHP_EOL : '';
$fragment = isset($parseUrl['fragment']) ? 'fragment: ' . $parseUrl['fragment'] . PHP_EOL : '';
$path = isset($parseUrl['path']) ? 'path: ' . $parseUrl['path'] . PHP_EOL : '';
$query = isset($parseUrl['query']) ? 'query: ' . $parseUrl['query'] . PHP_EOL : '';

echo 'Елементи переданого URL: ' . PHP_EOL .
    $scheme .
    $host .
    $path .
    $query .
    $fragment;

echo PHP_EOL . 'Запит у вигляді масиву:' . PHP_EOL;
parse_str($parseUrl['query'], $arrayQuery);
var_export($arrayQuery);
