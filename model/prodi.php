<?php
class Prodi extends Model{
    public function viewProdi(){
        $query="SELECT * FROM prodi";
        $hasil=$this->con->query($query);
        $data=array();
        while($row=$hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
    }
}