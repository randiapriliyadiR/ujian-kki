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
$router->before('GET|POST', '/mahasiswa/.*', function() {
    if (isset($_SESSION['ID']) AND isset($_SESSION['KEY'])) {
        $nim=kue('dekripsi',$_SESSION['ID']);
        $modelmahasiswa = new Mahasiswa;
        $data=$modelmahasiswa->numMahasiswa($nim);
        if($data!=1){
            unset($_SESSION['ID']);unset($_SESSION['KEY']);
            header('location: /');
            exit();
        }else{
            if(kue('dekripsi',$_SESSION['KEY'])!='mahasiswa'){
                unset($_SESSION['ID']);unset($_SESSION['KEY']);
                header('location: /');
                exit();
            }
        }
    }else{
        header('location: /');
        exit();
    }
});
$router->before('GET|POST', '/mahasiswa', function() {
    if (isset($_SESSION['ID']) AND isset($_SESSION['KEY'])) {
        $nim=kue('dekripsi',$_SESSION['ID']);
        $modelmahasiswa = new Mahasiswa;
        $data=$modelmahasiswa->numMahasiswa($nim);
        if($data!=1){
            unset($_SESSION['ID']);unset($_SESSION['KEY']);
            header('location: /');
            exit();
        }else{
            if(kue('dekripsi',$_SESSION['KEY'])!='mahasiswa'){
                unset($_SESSION['ID']);unset($_SESSION['KEY']);
                header('location: /');
                exit();
            }
        }
    }else{
        header('location: /');
        exit();
    }
});
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
        $router->before('GET|POST', '/hapus-user', function() {
            // jika get tidak ada maka akan dikembalikan ke halaman /akademik/user
            header('location: /akademik/user');
            exit();
        });
    $router->get('/hapus-user/(\w+)/(\d+)', '\App\Controllers\Akademik@hapusUser');
});


// login sebagai dosen
$router->mount('/dosen', function() use ($router) {
    // http://localhost:8080/dosen/soal
    $router->match('GET|POST','/soal', '\App\Controllers\Dosen@soal');
    // http://localhost:8080/dosen/soal/detail
        $router->before('GET|POST', '/soal/detail', function() {
            // jika post tidak ada maka akan dikembalikan ke halaman /dosen/soal
            if(!isset($_POST['judul']) AND !isset($_POST['matkul']) AND !isset($_POST['pg']) AND !isset($_POST['isian']) AND !isset($_POST['esai']) AND !isset($_POST['ket']) AND !isset($_POST['id_prodi']) AND !isset($_POST['angkatan'])){
                header('location: /dosen/soal');
                exit();
            }
        });
    $router->match('GET|POST','/soal/detail', '\App\Controllers\Dosen@detailSoal');
    // http://localhost:8080/dosen/soal/hapus-soal/$id/$string
        $router->before('GET|POST', '/soal/hapus-soal', function() {
            // jika get tidak ada maka akan dikembalikan ke halaman /dosen/soal
            header('location: /dosen/soal');
            exit();
        });
    $router->get('/soal/hapus-soal/(\d+)/(\w+)', '\App\Controllers\Dosen@hapusSoal');
});

$router->run();