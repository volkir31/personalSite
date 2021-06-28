<?php

namespace GuestBook;

class Record
{
    protected string $message;
    protected string $author;

    public function __construct(string $message, string $author)
    {
        $this->message = $message;
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }
}