<?php

namespace src\models\db;

use PDO;

class Connection
{
    private static $connection = null;

    public static function connect() {
        if(!self::$connection) {
            self::$connection = new PDO("mysql:host=". DBHOST .";port=". DBPORT .";dbname=". DBNAME, DBUSER, DBPASS, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        }

        return self::$connection;
    }
}