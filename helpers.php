<?php

function array_get($array, $key, $default = null)
{
    $keysArray = explode('.', $key);
    $ref = &$array;

    while ($key = array_shift($keysArray)) {
        $ref = &$ref[$key];
    }

    return !is_null($ref) ? $ref : $default;
}

function includeView($templateName, $data = [])
{
    $pathFile = VIEW_DIR . str_replace('.', '/', $templateName) . '.php';

    if (!file_exists($pathFile)) {
        echo 'Template not exist.';
        return;
    }

    extract($data);

    require_once $pathFile;
}
