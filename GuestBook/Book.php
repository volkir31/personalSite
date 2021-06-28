<?php

namespace GuestBook;


use Models\DB1;

class Book
{
    /**
     * Add new record in guest book
     * @param Record $record
     */
    public function addRecord(Record $record): void
    {
        $data = [$record->getAuthor(), $record->getMessage()];
        $db = new DB1('nineth', 'root', 'root');
        $db->connect()->query('INSERT INTO nineth.guestbook (author, text) VALUES (?,?)', $data);
    }

    /**
     * Return all records from database
     * @return array
     */
    public static function getData(): array
    {
        $db = new DB1('nineth', 'root', 'root');
        return $db->getData('guestbook');
    }

    /**
     * Remove record by id from guest book
     * @param string $id
     */
    public function removeRecord(string $id)
    {
        $db = new DB1('nineth', 'root', 'root');
        $db->connect()->query('DELETE FROM nineth.guestbook WHERE id = ?', [$id]);
    }
}