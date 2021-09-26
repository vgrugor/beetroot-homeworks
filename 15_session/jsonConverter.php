<?php

/**
 * @param string $fileName
 * @return array
 * @throws Exception
 */
function convertJsonToArray(string $fileName): array
{
    if (!file_exists($fileName)) {
        throw new Exception("Файлу '$fileName' не існує");
    }

    $contentFile = file_get_contents($fileName);

    if (!$contentFile) {
        throw new Exception("Невдалося прочитати вміст файлу $fileName");
    }

    try {
        $elements = json_decode($contentFile, true, 512, JSON_THROW_ON_ERROR);
    } catch (Exception $e) {
        throw new Exception("Невдалося декодувати json з файлу '$fileName'");
    }

    return $elements;
}
