<?php

namespace App
;

use App\Config\Config;
use PDO;

class Database
{
    public static function database():PDO
    {
        $cfg = Config::getDatabase();
        return self::createConnexion($cfg);
    }
    private static function createConnexion(array $cfg):PDO
    {
        return new PDO('mysql:host=' . $cfg['host'] . ';dbname=' . $cfg['dbname'] . ';charset=utf8', $cfg['user'], $cfg['password']);
    }
}
