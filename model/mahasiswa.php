<?php
class Mahasiswa extends Model{
    public function viewMahasiswa(){
        $query="SELECT *,`kelas`.`nama` as `nama_kelas` FROM mahasiswa INNER JOIN `kelas` ON `mahasiswa`.`id_kelas`=`kelas`.`id_kelas`";
        $hasil=$this->con->query($query);
        $data=array();
        while($row=$hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
    }
    public function viewIdMahasiswa(){
        $query="SELECT `id_mhs` FROM `mahasiswa` ORDER BY `id_mhs` DESC LIMIT 1";
        $hasil=$this->con->query($query);
        $data=$hasil->fetch_assoc();
        return $data;
    }
    public function loginMahasiswa($nim){
        $query="SELECT * FROM `mahasiswa` WHERE `nim`='$nim'";
        $hasil=$this->con->query($query);
        $data=$hasil->fetch_assoc();
        return $data;
    }
    public function dataMahasiswa($nim){
        $query="SELECT *,`prodi`.`nama` AS `namaprodi` FROM `mahasiswa` INNER JOIN 
        `kelas` ON `mahasiswa`.`id_kelas`=`kelas`.`id_kelas` INNER JOIN 
        `prodi` ON `kelas`.`id_prodi`=`prodi`.`id_prodi` WHERE `nim`='$nim'";
        $hasil=$this->con->query($query);
        $data=$hasil->fetch_assoc();
        return $data;
    }
    public function numMahasiswa($nim){
        $query="SELECT * FROM `mahasiswa` WHERE `nim`='$nim'";
        $hasil=$this->con->query($query);
        $data=mysqli_num_rows($hasil);
        return $data;
    }
    public function inputMahasiswa($id_mhs,$nim,$nama,$pass,$id_kls,$email,$telp,$jk){
        $query="INSERT INTO 
        `mahasiswa`(`id_mhs`, `nim`, `nama`, `password`, `id_kelas`, `email`, `telp`, `jenis_kelamin`) 
            VALUES ('$id_mhs','$nim','$nama','$pass','$id_kls','$email','$telp','$jk')";
        
        $this->con->query($query);
    }
    public function hapusMahasiswa($id){
        $query="DELETE FROM `mahasiswa` WHERE `id_mhs`='$id'";
        $this->con->query($query);
    }
}