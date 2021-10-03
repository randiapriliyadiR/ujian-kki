<?php
namespace App\Controllers;
class Dosen{
    function soal(){
        view('dosen.soal');
    }
    function detailSoal(){
        view('dosen.detail-soal');
    }
    function hapusSoal($id,$judul){
        $_GET['id']=$id;
        $_GET['judul']=$judul;
        view('dosen.proses.hapus-soal');
    }
}