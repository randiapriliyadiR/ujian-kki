<?php
$modelmahasiswa = new Mahasiswa;
$modeldosen = new Dosen;

if($_GET['user']=='mahasiswa'){
    $id=$_GET['id'];
    $modelmahasiswa->hapusMahasiswa($id);
    header("Location: /akademik/user");
}elseif($_GET['user']=='dosen'){
    $id=$_GET['id'];
    $modeldosen->hapusDosen($id);
    header("Location: /akademik/user");
}

