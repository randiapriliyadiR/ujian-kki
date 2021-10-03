<?php
namespace App\Controllers;
class Mahasiswa{
    function index(){
        view('mahasiswa.utama');;
    }
    function soal(){
        view('mahasiswa.soal');
    }
}
