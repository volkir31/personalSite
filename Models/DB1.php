<?php

namespace Models;

use PDO;

class DB1
{
    protected string $dbname;
    protected string $login;
    protected string $password;
    protected object $dbh;


    public function __construct(string $dbname, string $login, string $password)
    {
        $this->dbname = $dbname;
        $this->login = $login;
        $this->password = $login;
    }

    /**
     * Get connect with database
     * @return $this
     */
    public function connect(): DB1
    {
        $this->dbh = new PDO('mysql:localhost;dbname=' . $this->dbname, $this->login, $this->password);
        return $this;
    }

    /**
     * Execute SQL request without params
     * @param string $sql
     * @return array
     */
    public function execute(string $sql): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Execute SQL request with params
     * @param string $sql
     * @param array $data
     * @return array
     */
    public function query(string $sql, array $data): array
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }

    /**
     * Get data from table whose name is passed as an argument
     * @param string $db
     * @return array
     */
    public function getData(string $db): array
    {
        if ('about' === $db || 'guestbook' === $db || 'photos' === $db) {
            return $this->connect()->execute("SELECT * FROM nineth.$db");
        }
        return [];
    }
}