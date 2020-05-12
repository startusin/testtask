<?php
namespace app;

class DB {
    private static $db = false;

    public function init() {
        self::$db = new \PDO('mysql:host=localhost;dbname=testphp', 'user', '');
    }

    /**
     * @return \PDO|bool
     */
    public static function getInstance() {
        return self::$db;
    }
}
