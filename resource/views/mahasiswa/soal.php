<?php
$namafile=kue('enkripsi','judul');
$file='resource/data/'.$namafile.'.json';
$anggota=file_get_contents($file);
$data=json_decode($anggota,true);
print_r($data);
?>