<?php 
$csrf = new CSRF();
$modelsoal = new Soal;


if(isset($_POST['tambah-soal'])){
    if ($csrf->validate('tambah-soal')) {
        $idsoal=$modelsoal->viewIdSoal();
        $id_soal = isset($idsoal['id_soal']) ? $idsoal['id_soal']+1 : 1;

        $judul=kue('enkripsi',bersih($_POST['judul']));
        $matkul=kue('enkripsi',bersih($_POST['matkul']));
        $pg=bersih($_POST['pg']);
        $isian=bersih($_POST['isian']);
        $esai=bersih($_POST['esai']);
        $ket=kue('enkripsi',bersih($_POST['ket']));
        $id_prodi=kue('enkripsi',bersih($_POST['id_prodi']));
        $angkatan=bersih($_POST['angkatan']);
    }else {
        echo "kode csrf salah";
    }
}

if(isset($_POST["tambah-soaldetail"])){
    if ($csrf->validate('tambah-soaldetail')) {
        unset($_POST["tambah-soaldetail"]);
        unset($_POST["key-awesome"]);
        // $_POST['judul']=$judul;
        // $_POST['matkul']=$matkul;
        // $_POST['pg']=$pg;
        // $_POST['isian']=$isian;
        // $_POST['esai']=$esai;
        // $_POST['ket']=$ket;
        // $_POST['angkatan']=$angkatan;

        $id_soal=kue('dekripsi',$_POST['id_soal']);
        $id_prodi=kue('dekripsi',$_POST['id_prodi']);
        $judul=kue('dekripsi',$_POST['judul']);
        $pg=$_POST['pg'];
        $isian=$_POST['isian'];
        $esai=$_POST['esai'];
        $matkul=kue('dekripsi',$_POST['matkul']);
        $ket=kue('dekripsi',$_POST['ket']);
        $namafile=kue('enkripsi',$judul);

        unset($_POST["angkatan"]);
        unset($_POST["id_prodi"]);
        unset($_POST["id_soal"]);
        unset($_POST["ket"]);
        unset($_POST["esai"]);
        unset($_POST["isian"]);
        unset($_POST["pg"]);
        unset($_POST["matkul"]);
        unset($_POST["judul"]);
        $data=$_POST;
        $json_encode=json_encode($data,JSON_PRETTY_PRINT);
        file_put_contents('resource/data/'.$namafile.'.json',$json_encode);
        $modelsoal->inputSoal($id_soal,$id_prodi,$judul,$pg,$isian,$esai,$matkul,$ket);
        header('Location: /dosen/soal');
    }else {
        echo "kode csrf salah";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail soal <?=$judul?></title>
</head>

<body>
    <h1>detail soal</h1>
    <form action="" method="post">
    <?=$csrf->input('tambah-soaldetail');?>
    <input type="hidden" name="judul" value="<?=$judul;?>">
    <input type="hidden" name="id_soal" value="<?=$id_soal;?>">
    <input type="hidden" name="matkul" value="<?=$matkul;?>">
    <input type="hidden" name="pg" value="<?=$pg;?>">
    <input type="hidden" name="isian" value="<?=$isian;?>">
    <input type="hidden" name="esai" value="<?=$esai;?>">
    <input type="hidden" name="ket" value="<?=$ket;?>">
    <input type="hidden" name="id_prodi" value="<?=$id_prodi;?>">
    <input type="hidden" name="angkatan" value="<?=$angkatan;?>">
        <h2>pg</h2>
        <?php
            for ($x = 1; $x <= $pg; $x++) {
        ?>
        <textarea name="<?=$x?>" id="<?=$x?>" cols="30" rows="10" placeholder="pertanyaan"></textarea><br>
        <label for="a">A:</label><input type="text" name="<?=$x?>[a]" id="a<?=$x?>"><br>
        <label for="b">B:</label><input type="text" name="<?=$x?>[b]" id="b<?=$x?>"><br>
        <label for="c">C:</label><input type="text" name="<?=$x?>[c]" id="c<?=$x?>"><br>
        <label for="d">D:</label><input type="text" name="<?=$x?>[d]" id="d<?=$x?>"><br>
        <label for="jawaban">jawaban:</label>
        <select name="<?=$x?>[jawaban]" id="jawaban">
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
        </select><br><br>
        <?php
            }
        ?>
        <h2>isian</h2>
        <?php
        for ($x = 1; $x <= $isian; $x++) {
        ?>
        <textarea name="<?=$x+$pg?>" id="<?=$x+$pg?>" cols="30" rows="10" placeholder="pertanyaan"></textarea><br>
        <label for="jawaban<?=$x+$pg?>">jawaban:</label><input type="text" name="<?=$x+$pg?>[jawaban]" id="jawaban<?=$x+$pg?>"><br><br>
        <?php
            }
        ?>
        <h2>esai</h2>
        <?php
            for ($x = 1; $x <= $esai; $x++) {
        ?>
        <textarea name="<?=$x+$isian+$pg?>" id="<?=$x+$isian+$pg?>" cols="30" rows="10" placeholder="pertanyaan"></textarea><br>
        <?php
            }
        ?>
        <input type="submit" value="tambahkan" name="tambah-soaldetail">
    </form>
</body>

</html>