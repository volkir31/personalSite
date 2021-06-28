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

    /**
     * @param string $dbname
     * @param string $login
     * @param string $password
     * @return PDO
     */
    public static function getInstance(string $dbname, string $login, string $password): PDO
    {
        if (!isset(self::$connect['connect'])) {
            self::$connect['connect'] = new PDO("mysql:localhost;dbname=$dbname", $login, $password);;
        }

        return self::$connect['connect'];
    }

    /**
     * @param string $sql
     * @return array
     */
    public static function execute(string $sql): array
    {
        $sth = self::$connect['connect']->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}
