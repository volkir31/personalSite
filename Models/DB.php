<?php

namespace Models;

use Exception;
use PDO;

class DB
{
    private static array $connect = [];

    /**
     * @throws Exception Can't clone a singleton
     */
    private function __clone()
    {
        throw new Exception("Can't clone a singleton");
    }

    public static function getInstance(string $dbname, string $login, string $password): PDO
    {
        if (!isset(self::$connect['connect'])) {
            self::$connect['connect'] = new PDO("mysql:localhost;dbname=$dbname", $login, $password);;
        }

        return self::$connect['connect'];
    }

    public static function execute(string $sql)
    {
        $sth = self::$connect['connect']->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}
