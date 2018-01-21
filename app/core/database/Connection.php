<?php


namespace StudioVisual\Core\Database;


class Connection
{
    const
        DBNAME = 'mvc',
        USERNAME = 'root',
        PASSWRD = 'intest';
    private static $conn;

    private function __construct()
    {
    }

    public static function getConnection():\PDO
    {
        if (self::$conn === null) {
            self::$conn = new \PDO('mysql:host=mvc_db;dbname='.self::DBNAME, self::USERNAME, self::PASSWRD);
        }
        return self::$conn;
    }
}