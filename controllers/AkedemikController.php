<?php
namespace App\Controllers;
class Akademik{
    function user(){
        view('akademik.user');
    }
    function hapusUser($user,$id){
        $_GET['user']=$user;
        $_GET['id']=$id;
        view('akademik.proses.hapus-user');
    }
}