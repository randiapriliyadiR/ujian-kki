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
// $router->before('GET|POST', '/mahasiswa', function() {
//     if (!isset($_SESSION['ID'])) {
//         header('location: /');
//         exit();
//     }
// });
$router->mount('/mahasiswa', function() use ($router) {
    // http://localhost:8080/mahasiswa
    $router->get('/', '\App\Controllers\Mahasiswa@index');
    // http://localhost:8080/mahasiswa/soal
    $router->get('/soal', '\App\Controllers\Mahasiswa@soal');
});


// login sebagai akademik
$router->mount('/akademik', function() use ($router) {
    // http://localhost:8080/akademik/user
    $router->match('GET|POST','/user(/\w+)?', '\App\Controllers\Akademik@user');
    // http://localhost:8080/akademik/hapus-user
    $router->get('/hapus-user/(\w+)/(\d+)', '\App\Controllers\Akademik@hapusUser');
});


// login sebagai dosen
$router->mount('/dosen', function() use ($router) {
    // http://localhost:8080/dosen/soal
    $router->match('GET|POST','/soal', '\App\Controllers\Dosen@soal');
    // http://localhost:8080/dosen/soal/detail
    $router->match('GET|POST','/soal/detail', '\App\Controllers\Dosen@detailSoal');
    // http://localhost:8080/dosen/soal/hapus-soal/$id/$string
    $router->get('/soal/hapus-soal/(\d+)/(\w+)', '\App\Controllers\Dosen@hapusSoal');
});

$router->run();