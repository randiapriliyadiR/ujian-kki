<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../application/library.php';
require_once __DIR__ . '/../application/php-csrf.php';
require_once __DIR__ . '/../model.php';
require_once __DIR__ . '/../controller.php';

// belum login
$router->set404('\App\Controllers\Guest@notfound');
$router->match('GET|POST','/', '\App\Controllers\Guest@index');

// login sebagai mahasiswa

// login sebagai akademik
$router->match('GET|POST','/akademik/user(/\w+)?', '\App\Controllers\Akademik@user');
$router->get('/akademik/hapus-user/(\w+)/(\w+)', '\App\Controllers\Akademik@hapusUser');

// login sebagai doesn

$router->run();