<?php

namespace App;

class Config
{
    private static $instance;
    private array $configs;

    private function __construct()
    {
        $this->configs = require_once 'Configs/db.php';
    }

    public static function getInstance() : Config
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function get($config, $default = null)
    {
        return array_get($this->configs, $config, $default);
    }
}
