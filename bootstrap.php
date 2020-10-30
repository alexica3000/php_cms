<?php

const APP_DIR = '';
const VIEW_DIR = 'view';
const PREFIX = 'App\\';
const SRC_DIR = __DIR__ . '/src/';

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
