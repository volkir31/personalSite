<?php

namespace PhotoGallery;


class Photo
{
    protected string $path;
    protected string $name;
    protected string $temporaryPath;

    public function __construct(string $path, string $name, string $temporaryPath )
    {
        $this->path = $path;
        $this->name = $name;
        $this->temporaryPath = $temporaryPath;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTemporaryPath(): string
    {
        return $this->temporaryPath;
    }
}