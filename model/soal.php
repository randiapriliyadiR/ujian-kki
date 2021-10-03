<?php
class Soal extends Model{
    public function inputSoal($id_soal,$id_prodi,$judul,$pg,$isian,$esai,$matkul,$ket,$angkatan){
        $query="INSERT INTO 
        `soal`(`id_soal`, `id_prodi`, `judul`, `pg`, `isian`, `esai`, `matkul`, `ket`,`angkatan`) 
        VALUES ('$id_soal','$id_prodi','$judul','$pg','$isian','$esai','$matkul','$ket','$angkatan')";
        
        $this->con->query($query);
    }
    public function viewIdSoal(){
        $query="SELECT `id_soal` FROM `soal` ORDER BY `id_soal` DESC LIMIT 1";
        $hasil=$this->con->query($query);
        $data=$hasil->fetch_assoc();
        return $data;
    }
    public function viewSoal(){
        $query="SELECT * FROM soal";
        $hasil=$this->con->query($query);
        $data=array();
        while($row=$hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
    }
    public function hapusSoal($id){
        $query="DELETE FROM `soal` WHERE `id_soal`='$id'";
        $this->con->query($query);
    }
}