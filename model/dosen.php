<?php
class Dosen extends Model{
    public function viewDosen(){
        $query="SELECT * FROM dosen";
        $hasil=$this->con->query($query);
        $data=array();
        while($row=$hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
    }
    public function loginDosen($nidn){
        $query="SELECT * FROM `dosen` WHERE `nidn`='$nidn'";
        $hasil=$this->con->query($query);
        $data=$hasil->fetch_assoc();
        return $data;
    }
    public function viewIdDosen(){
        $query="SELECT `id_dosen` FROM `dosen` ORDER BY `id_dosen` DESC LIMIT 1";
        $hasil=$this->con->query($query);
        $data=$hasil->fetch_assoc();
        return $data;
    }
    public function inputDosen($id_dosen, $nidn, $nama, $password, $email, $telp, $level){
        $query="INSERT INTO 
        `dosen`(`id_dosen`, `nidn`, `nama`, `password`, `email`, `telp`, `level`) 
        VALUES ('$id_dosen','$nidn','$nama','$password','$email','$telp','$level')";
        
        $this->con->query($query);
    }
    public function hapusDosen($id){
        $query="DELETE FROM `dosen` WHERE `id_dosen`='$id'";
        $this->con->query($query);
    }
}