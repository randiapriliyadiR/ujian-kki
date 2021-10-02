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
$router->get('/mahasiswa/soal', '\App\Controllers\Mahasiswa@soal');

// login sebagai akademik
$router->match('GET|POST','/akademik/user(/\w+)?', '\App\Controllers\Akademik@user');
$router->get('/akademik/hapus-user/(\w+)/(\d+)', '\App\Controllers\Akademik@hapusUser');

// login sebagai dosen
$router->match('GET|POST','/dosen/soal', '\App\Controllers\Dosen@soal');
$router->match('GET|POST','/dosen/soal/detail/(\w+)/(\w+)/(\d+)/(\d+)/(\d+)/(\w+)/(\w+)/(\d+)', '\App\Controllers\Dosen@detailSoal');
$router->get('/dosen/soal/hapus-soal/(\d+)/(\w+)', '\App\Controllers\Dosen@hapusSoal');

$router->run();