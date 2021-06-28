<?php


namespace About;


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

    public function updateAbout()
    {
        $db = new DB1('nineth', 'root', 'root');
        $name = $this->name;
        $about = $this->about;
        $db->connect()->query("UPDATE nineth.about SET name = ?",[$name]);
        $db->connect()->query("UPDATE nineth.about SET about = ?", [$about]);
    }

    /**
     * @return array
     */
    public static function getAbout(): array
    {
        $db = new DB1('nineth', 'root', 'root');
        return $db->getData('about');
    }
}