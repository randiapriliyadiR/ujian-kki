<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../application/library.php';
require_once __DIR__ . '/../controllers/controller.php';


$router->set404('\App\Controllers\Application@notfound');

$router->get('/', '\App\Controllers\Mahasiswa@index');

$router->run();