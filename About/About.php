<?php


namespace About;


use Exception;
use Models\DB1;

class About
{
    protected string $name;
    protected string $about;

    public function __construct(string $name, $about)
    {
        $this->name = $name;
        $this->about = $about;
    }

    /**
     * @throws Exception
     */
    public function updateAbout()
    {
        $config = (require __DIR__ . '/../config.php')['db'];
        $db = new DB1($config['dbname'], $config['login'], $config['password']);
        $name = $this->name;
        $about = $this->about;
        $db->connect()->query("UPDATE nineth.about SET name = ?",[$name]);
        $db->connect()->query("UPDATE nineth.about SET about = ?", [$about]);
    }

    /**
     * @return array
     * @throws Exception
     */
    public static function getAbout(): array
    {
        $config = (require __DIR__ . '/../config.php')['db'];
        $db = new DB1($config['dbname'], $config['login'], $config['password']);
        return $db->getData('about');
    }
}