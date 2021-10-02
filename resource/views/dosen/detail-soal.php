<?php 
$modelsoal = new Soal;
$idsoal=$modelsoal->viewIdSoal();
$id_soal = isset($idsoal['id_soal']) ? $idsoal['id_soal']+1 : 1;

$judul=kue('dekripsi',$_GET['judul']);
$matkul=kue('dekripsi',$_GET['matkul']);
$pg=$_GET['pg'];
$isian=$_GET['isian'];
$esai=$_GET['esai'];
$ket=kue('dekripsi',$_GET['ket']);
$id_prodi=kue('dekripsi',$_GET['id_prodi']);
$angkatan=$_GET['angkatan'];

if(isset($_POST["tambah-soal"])){
    unset($_POST["tambah-soal"]);
    $_POST['judul']=$judul;
    $_POST['matkul']=$matkul;
    $_POST['pg']=$pg;
    $_POST['isian']=$isian;
    $_POST['esai']=$esai;
    $_POST['ket']=$ket;
    $_POST['angkatan']=$angkatan;
    $data=$_POST;
    $json_encode=json_encode($data,JSON_PRETTY_PRINT);
    file_put_contents('resource/data/'.$_GET['judul'].'.json',$json_encode);
    $modelsoal->inputSoal($id_soal,$id_prodi,$judul,$pg,$isian,$esai,$matkul,$ket);
    header('Location: /dosen/soal');
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
        <input type="submit" value="tambahkan" name="tambah-soal">
    </form>
</body>

</html>