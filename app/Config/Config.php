<?php

namespace App\Config;

class Config{
    private static function getConfig()
    {
        return parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . 'config.ini', true);
    }
    public static function getDatabase():array {
        $cfg = self::getConfig();
        return $cfg['database'];
    }
}