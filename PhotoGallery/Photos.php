<?php

namespace PhotoGallery;


use Models\DB1;

class Photos
{
    protected string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function addPhoto(Photo $photo)
    {
        $name = $photo->getName();
        $data = [$this->path, $name];

        move_uploaded_file($photo->getTemporaryPath(), __DIR__ . '/../' . $this->path . $name);

        $db = new DB1('nineth', 'root', 'root');
        $db->connect()->query("INSERT INTO nineth.photos (path, name) VALUES (?, ?)", $data);
    }
}