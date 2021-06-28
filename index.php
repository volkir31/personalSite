<?php
echo "<link rel='stylesheet' href='/templates/style.css'>";
require __DIR__ . '/autoload.php';

//$a = \Models\DB::getInstance('nineth', 'root', 'root');
//
//$data = \Models\DB::execute('SELECT * FROM nineth.guestbook');
$view = new \View\View();
$book = new \GuestBook\Book();

$record = $_POST;
if (isset($record['author']) && !empty($record['author']) && isset($record['text']) && !empty($record['text'])) {
    $rec = new \GuestBook\Record($record['text'], $record['author']);
    $book->addRecord($rec);
}

$view->display('/../templates/index.php');