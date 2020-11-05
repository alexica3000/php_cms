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
