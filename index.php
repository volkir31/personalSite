<?php
echo "<link rel='stylesheet' href='templates/style.css'>";
require __DIR__ . '/autoload.php';

$view = new \View\View();
$book = new \GuestBook\Book();

$record = $_POST;
if (isset($record['author']) && !empty($record['author']) && isset($record['text']) && !empty($record['text'])) {
    $rec = new \GuestBook\Record($record['text'], $record['author']);
    try {
        $book->addRecord($rec);
    } catch (Exception $e) {
    }
}

try {
    $view->display('/../templates/index.php');
} catch (Exception $e) {
    echo $e->getMessage();
}