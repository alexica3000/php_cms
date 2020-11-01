<?php

const APP_DIR = '';
const SRC_DIR = __DIR__ . '/src/';
const VIEW_DIR = SRC_DIR . 'Views';
const PREFIX = 'App\\';

spl_autoload_register(function ($class) {
    $len = strlen(PREFIX);

    if (strncmp(PREFIX, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = SRC_DIR . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
