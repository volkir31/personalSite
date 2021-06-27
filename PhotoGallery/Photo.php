<?php

namespace PhotoGallery;


class Photo
{
    protected string $name;
    protected string $temporaryPath;

    public function __construct(string $name, string $temporaryPath )
    {
        $this->name = $name;
        $this->temporaryPath = $temporaryPath;
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