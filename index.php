<?php

require __DIR__ . '/autoload.php';

//$a = \Models\DB::getInstance('nineth', 'root', 'root');
//
//$data = \Models\DB::execute('SELECT * FROM nineth.guestbook');
$a = new \Models\DB1('nineth', 'root', 'root');

$data = $a->connect()->execute('SELECT * FROM nineth.guestbook');
var_dump($data);