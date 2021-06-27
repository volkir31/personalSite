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

    public function connect(): DB1
    {
        $this->dbh = new PDO('mysql:localhost;dbname=' . $this->dbname, $this->login, $this->password);
        return $this;
    }

    public function execute(string $sql)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function query(string $sql, array $data){
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }
}