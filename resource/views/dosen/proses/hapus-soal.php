<?php
$modelsoal = new Soal;

$id=$_GET['id'];
$judul=$_GET['judul'];
$modelsoal->hapusSoal($id);
unlink('resource/data/'.$judul.'.json');
header("Location: /dosen/soal");