<?php
namespace App\Controllers;
class Dosen{
    function soal(){
        view('dosen.soal');
    }
    function detailSoal($judul,$matkul,$pg,$isian,$esai,$ket,$id_prodi,$angkatan){
        $_GET['judul']=$judul;
        $_GET['matkul']=$matkul;
        $_GET['pg']=$pg;
        $_GET['isian']=$isian;
        $_GET['esai']=$esai;
        $_GET['ket']=$ket;
        $_GET['id_prodi']=$id_prodi;
        $_GET['angkatan']=$angkatan;
        view('dosen.detail-soal');
    }
    function hapusSoal($id,$judul){
        $_GET['id']=$id;
        $_GET['judul']=$judul;
        view('dosen.proses.hapus-soal');
    }
}