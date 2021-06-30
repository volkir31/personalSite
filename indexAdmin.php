<?php
require __DIR__ . '/autoload.php';

use GuestBook\Book;
use View\View;

if (!\Login\Login::verifyKey()) {
    header('location: indexLogin.php');
}
echo "<link rel='stylesheet' href='/templates/styleAdmin.css'>";

$photosFromUser = [];
$countPhotos = 0;
if (isset($_FILES['photos'])) {
    $countPhotos = count($_FILES['photos']['name']);
}
if (isset($_FILES['photos']) && $countPhotos > 0) {
    $photosFromUser = $_FILES['photos'];
}

$photos = new \PhotoGallery\Photos('/images/');
for ($i = 0; $i < $countPhotos; $i++) {
    if ($photosFromUser['size'][$i] > 0) {
        $photo = new \PhotoGallery\Photo($photosFromUser['name'][$i], $photosFromUser['tmp_name'][$i]);
        $photos->addPhoto($photo);
    }
}

$about = [];
if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['about']) && !empty($_POST['about'])) {
    $about = $_POST;
    $db = new \About\About($about['name'], $about['about']);
    $db->updateAbout();
}

$view = new View();
$book = new Book();

$post = $_POST;
if (isset($post['id']) && !empty($post['id'])) {
    $id = (int)$post['id'];
    $book->removeRecord($id);
}

$view->display('/../templates/admin.php');

