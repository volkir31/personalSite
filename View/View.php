<?php


namespace View;


use About\About;
use Exception;
use GuestBook\Book;
use Models\DB1;
use PhotoGallery\Photos;

class View
{
    protected array $data = [];

    /**
     * @param $name
     * @param $value
     */
    public function assign($name, $value)
    {
        $this->data[$name] = $value;
    }


    /**
     * @param string $template
     * @throws Exception
     */
    public function display(string $template): void
    {
        $records = Book::getData();
        $photos = Photos::getPhotos();
        $abouts =  About::getAbout();
        if (!empty($records) || !empty($photos) || !empty($about)) {
            include __DIR__ . $template;
        } else {
            throw new Exception('empty');
        }
    }
}