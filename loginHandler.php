<?php
require __DIR__ . '/autoload.php';

$adminData = [];
if (isset($_POST['login']) && !empty($_POST['login']) && !empty($_POST['password'])) {
    $adminData = $_POST;
}

$db = new \Login\Login($adminData['login'], $adminData['password']);
if ($db->verify()) {
    setcookie('secretkey', $db->getKey());
    header('location: /indexAdmin.php');
}
if(!$db->verify()){
    header('location: /indexLogin.php');
}