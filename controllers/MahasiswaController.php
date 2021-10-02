<?php
namespace App\Controllers;
class Mahasiswa{
    function index(){
        echo "contoh index mahasiswa";
    }
    function soal(){
        view('mahasiswa.soal');
    }
}
