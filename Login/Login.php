<?php


namespace Login;


use Exception;
use Models\DB1;

class Login
{
    protected string $login;
    protected string $password;

    public function __construct(string $login, string $password)
    {
        $this->login = trim($login);
        $this->password = trim($password);
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function verify(): bool
    {
        $config = (require __DIR__ . '/../config.php')['db'];
        $db = new DB1($config['dbname'], $config['login'], $config['password']);
        $adminData = $db->connect()->execute('SELECT * FROM nineth.admin');
        $password = md5($this->login . $this->password);
        if ($password === $adminData[0]['password'] && $adminData[0]['login'] === $this->login) {
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return md5($this->login . $this->password);
    }

    /**
     * Verify secret key from cookie and password from database
     * @return bool
     * @throws Exception
     */
    public static function verifyKey(): bool
    {
        $key = $_COOKIE;
        $config = (require __DIR__ . '/../config.php')['db'];
        $db = new DB1($config['dbname'], $config['login'], $config['password']);
        $password = $db->connect()->execute('SELECT * FROM nineth.admin')[0]['password'];
        if (isset($key['secretkey']) && $password === $key['secretkey']) {
            return true;
        }
        return false;
    }
}