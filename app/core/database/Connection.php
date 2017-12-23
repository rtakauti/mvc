<?php


namespace StudioVisual\Core\Database;


class Connection
{
    const
        DBNAME = 'mvc',
        USERNAME = 'root',
        PASSWRD = '';
    private static $conn;

    private function __construct()
    {
    }

    public static function getConnection():\PDO
    {
        if (self::$conn === null) {
            self::$conn = new \PDO('mysql:host=localhost;dbname='.self::DBNAME, self::USERNAME, self::PASSWRD);
        }
        return self::$conn;
    }
}