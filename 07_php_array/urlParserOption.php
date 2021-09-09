<?php

//розділяємо опшин та його значення
$optionAndValue = explode('=', $argv[1], 2);
$url = $optionAndValue[1];

$parseUrl = parse_url($url);

$scheme = isset($parseUrl['scheme']) ? 'scheme: ' . $parseUrl['scheme'] . PHP_EOL : '';
$host = isset($parseUrl['host']) ? 'host: ' . $parseUrl['host'] . PHP_EOL : '';
$path = isset($parseUrl['path']) ? 'path: ' . $parseUrl['path'] . PHP_EOL : '';
$query = isset($parseUrl['query']) ? 'query: ' . $parseUrl['query'] . PHP_EOL : '';
$fragment = isset($parseUrl['fragment']) ? 'fragment: ' . $parseUrl['fragment'] . PHP_EOL : '';

echo $scheme .
    $host .
    $path .
    $query .
    $fragment;
