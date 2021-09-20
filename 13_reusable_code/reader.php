<?php

const JSON_FILE_NAME = 'db.json';

if (!file_exists(JSON_FILE_NAME)) {
    die('Файлу ' . JSON_FILE_NAME . ' не існує' . PHP_EOL);
}

$fileContent = file_get_contents(JSON_FILE_NAME);

if (!$fileContent) {
    die('Невдалося прочитати інформацію з файлу ' . JSON_FILE_NAME . PHP_EOL);
}

$fileContentInArray = json_decode($fileContent, true);

if ($fileContentInArray === null) {
    die('Невдалося розпізнати json з файлу ' . JSON_FILE_NAME . PHP_EOL);
}
