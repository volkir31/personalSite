<?php

namespace GuestBook;


use Exception;
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
        $config = (require __DIR__ . '/../config.php')['db'];
        $db = new DB1($config['dbname'], $config['login'], $config['password']);
        $db->connect()->query('INSERT INTO nineth.guestbook (author, text) VALUES (?,?)', $data);
    }

    /**
     * Return all records from database
     * @return array
     * @throws Exception
     */
    public static function getData(): array
    {
        $config = (require __DIR__ . '/../config.php')['db'];
        $db = new DB1($config['dbname'], $config['login'], $config['password']);
        return $db->getData('guestbook');
    }

    /**
     * Remove record by id from guest book
     * @param string $id
     * @throws Exception
     */
    public function removeRecord(string $id)
    {
        $config = (require __DIR__ . '/../config.php')['db'];
        $db = new DB1($config['dbname'], $config['login'], $config['password']);
        $db->connect()->query('DELETE FROM nineth.guestbook WHERE id = ?', [$id]);
    }
}