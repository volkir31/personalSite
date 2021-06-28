<?php

namespace GuestBook;


use Models\DB1;

class Book
{
    public function addRecord(Record $record): void
    {
        $data = [$record->getAuthor(), $record->getMessage()];
        $db = new DB1('nineth', 'root', 'root');
        $db->connect()->query('INSERT INTO nineth.guestbook (author, text) VALUES (?,?)', $data);
    }

    /**
     * @return array
     */
    public static function getData(): array
    {
        $db = new DB1('nineth', 'root', 'root');
        return $db->getData('guestbook');
    }

    public function removeRecord(string $id)
    {
        $db = new DB1('nineth', 'root', 'root');
        $db->connect()->query('DELETE FROM nineth.guestbook WHERE id = ?', [$id]);
    }
}