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
        $db->connect()->execute("UPDATE nineth.about SET name = $name");
        $db->connect()->execute("UPDATE nineth.about SET about = $about");
    }
}