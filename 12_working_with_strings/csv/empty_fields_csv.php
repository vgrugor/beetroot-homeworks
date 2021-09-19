<?php

const JSON_FILE_NAME = 'oscar_age_female.json';
const CSV_FILE_NAME = 'oskar.csv';

if (!file_exists(JSON_FILE_NAME)) {
    die('Файлу ' . JSON_FILE_NAME . 'не існує!');
}

$contentFile = file_get_contents(JSON_FILE_NAME);

if (!$contentFile) {
    die('Невдалося прочитати файл ' . JSON_FILE_NAME);
}

$contentFromFileToArray = json_decode($contentFile, true);

if (!$contentFromFileToArray) {
    die('Не вдається розпізнати json з файлу ' . JSON_FILE_NAME);
}

$elementWithUniqueKeys = [];

foreach ($contentFromFileToArray as $item) {
    $elementWithUniqueKeys += $item;
}

$header = array_keys($elementWithUniqueKeys);

$resourceCsvFile = fopen(CSV_FILE_NAME, 'wb');

if (!$resourceCsvFile) {
    die('Не вдалося відкрити файл' . CSV_FILE_NAME . ' для читання ');
}

fputcsv($resourceCsvFile, $header);

$keysFromCsv = $header;

$recordCsvTemplate = array_fill_keys($keysFromCsv, '');

foreach ($contentFromFileToArray as $record) {
    $readyRecord = array_merge($recordCsvTemplate, $record);
    fputcsv($resourceCsvFile, $readyRecord);
}

if (fclose($resourceCsvFile)) {
    echo 'Файл ' . CSV_FILE_NAME . ' успішно створено' . PHP_EOL;
}