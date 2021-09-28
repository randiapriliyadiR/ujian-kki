<?php
class Kelas extends Model{
    public function viewKelas(){
        $query="SELECT * FROM kelas";
        $hasil=$this->con->query($query);
        $data=array();
        while($row=$hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
    }
}