<?php


namespace Login;


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
     */
    public function verify(): bool
    {
        $db = new DB1('nineth', 'root', 'root');
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
     */
    public static function verifyKey(): bool
    {
        $key = $_COOKIE;
        $db = new DB1('nineth', 'root', 'root');
        $password = $db->connect()->execute('SELECT * FROM nineth.admin')['password'];
        if (isset($key['secretkey']) && $password === $key['secretkey']) {
            return true;
        }
        return false;
    }
}