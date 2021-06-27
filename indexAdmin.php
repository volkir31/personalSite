<?php
echo "<link rel='stylesheet' href='/templates/style.css'>";
require __DIR__ . '/autoload.php';
require __DIR__ . '/templates/admin.php';

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
if (isset($_POST) && !empty($_POST)) {
    $about = $_POST;
    $db = new \About\About($about['name'], $about['about']);
    $db->updateAbout();
}

