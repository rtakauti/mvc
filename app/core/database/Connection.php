<?php


namespace StudioVisual\Core\Database;


class Connection
{
    private static $conn;

    private function __construct()
    {
    }

    public static function getConnection()
    {
        if (self::$conn === null) {
            self::$conn = new \PDO('mysql:host=localhost;dbname=mvc', 'root', '');
        }
        return self::$conn;
    }
}