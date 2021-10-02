<?php
$csrf = new CSRF();
$modelprodi = new Prodi;
$modelsoal = new Soal;
if(isset($_POST['tambah-soal'])){
    if ($csrf->validate('tambah-soal')) {
        $judul=kue('enkripsi',bersih($_POST['judul']));
        $matkul=kue('enkripsi',bersih($_POST['matkul']));
        $pg=bersih($_POST['pg']);
        $isian=bersih($_POST['isian']);
        $esai=bersih($_POST['esai']);
        $ket=kue('enkripsi',bersih($_POST['ket']));
        $id_prodi=kue('enkripsi',bersih($_POST['id_prodi']));
        $angkatan=bersih($_POST['angkatan']);
        header('Location: /dosen/soal/detail/'.$judul.'/'.$matkul.'/'.$pg.'/'.$isian.'/'.$esai.'/'.$ket.'/'.$id_prodi.'/'.$angkatan);
    }
    else {
        echo "kode csrf salah";
    }
}
?>
<!-- ==================================================================================================== -->
<!-- =======================                     pembatas                     =========================== -->
<!-- ==================================================================================================== -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soal</title>
</head>

<body>
    <h1>tambah soal</h1>
    <form action="" method="post" autocomplete="off">
        <?=$csrf->input('tambah-soal');?>
        <input type="text" name="judul" id="judul" placeholder="judul" autocomplete="off"><br>
        <input type="text" name="matkul" id="matkul" placeholder="matkul" autocomplete="off"><br>
        <input type="number" name="pg" id="pg" placeholder="jumlah soal pg" autocomplete="off" min="0"><br>
        <input type="number" name="isian" id="isian" placeholder="jumlah soal isian" autocomplete="off" min="0"><br>
        <input type="number" name="esai" id="esai" placeholder="jumlah soal esai" autocomplete="off" min="0"><br>
        <textarea name="ket" id="ket" cols="30" rows="10" autocomplete="off" placeholder="keterangan soal"></textarea><br>
        <select name="id_prodi" id="id_prodi" autocomplete="off">
        <?php foreach($modelprodi->viewprodi() as $prodi){ ?>
                <option value="<?= $prodi['id_prodi']?>"><?= $prodi['nama']?></option>
            <?php } ?>
        </select><br>
        <input type="number" name="angkatan" id="angkatan" min="1" max="<?=date('Y')?>" placeholder="angkatan" autocomplete="off"><br>
        <input type="submit" value="tambah" name="tambah-soal">
    </form>
    <br>
    <h1>soal ujian</h1>
    <table border="1">
        <thead>
            <tr>
                <td>no</td>
                <td>judul</td>
                <td>jumlah soal</td>
                <td>mata kuliah</td>
                <td>keterangan</td>
                <td>opsi</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach($modelsoal->viewSoal() as $soal){ ?>
            <tr>
                <td><?= $soal['id_soal'] ?></td>
                <td><?= $soal['judul'] ?></td>
                <td><?= $soal['pg']+$soal['isian']+$soal['esai'] ?></td>
                <td><?= $soal['matkul'] ?></td>
                <td><?= $soal['ket'] ?></td>
                <td><a href="/dosen/soal/hapus-soal/<?=$soal['id_soal']?>/<?=$soal['judul']?>">hapus</a> | edit</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>