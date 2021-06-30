<?php

namespace PhotoGallery;


use Exception;
use Models\DB1;

class Photos
{
    protected string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * Add photo in folder and create recording in database
     * @param Photo $photo
     * @throws Exception
     */
    public function addPhoto(Photo $photo)
    {
        $name = $photo->getName();
        $data = [$this->path, $name];

        move_uploaded_file($photo->getTemporaryPath(), __DIR__ . '/../' . $this->path . $name);

        $config = (require __DIR__ . '/../config.php')['db'];
        $db = new DB1($config['dbname'], $config['login'], $config['password']);
        $db->connect()->query("INSERT INTO nineth.photos (path, name) VALUES (?, ?)", $data);
    }

    /**
     * Get photos from database
     * @return array
     * @throws Exception
     */
    public static function getPhotos(): array
    {
        $config = (require __DIR__ . '/../config.php')['db'];
        $db = new DB1($config['dbname'], $config['login'], $config['password']);
        return $db->getData('photos');
    }
}