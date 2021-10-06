<?php
class Soal extends Model{
    public function inputSoal($id_soal,$id_prodi,$judul,$pg,$isian,$esai,$matkul,$ket,$angkatan,$mulai,$selesai){
        $query="INSERT INTO 
        `soal`(`id_soal`, `id_prodi`, `judul`, `pg`, `isian`, `esai`, `matkul`, `ket`,`angkatan`,`mulai`,`selesai`) 
        VALUES ('$id_soal','$id_prodi','$judul','$pg','$isian','$esai','$matkul','$ket','$angkatan','$mulai','$selesai')";
        
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
    public function tampilSoal($id_prodi,$angkatan){
        $query="SELECT *,`prodi`.`nama` AS `namaprodi` FROM `soal` INNER JOIN `prodi` ON `soal`.`id_prodi`=`prodi`.`id_prodi` WHERE `soal`.`id_prodi`='$id_prodi' AND `angkatan`='$angkatan'";
        $hasil=$this->con->query($query);
        $hasil=$this->con->query($query);
        $data=$hasil->fetch_assoc();
        return $data;
    }
    public function hapusSoal($id){
        $query="DELETE FROM `soal` WHERE `id_soal`='$id'";
        $this->con->query($query);
    }
}