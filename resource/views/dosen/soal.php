<?php
$csrf = new CSRF();
$modelprodi = new Prodi;
$modelsoal = new Soal;
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
    <form action="/dosen/soal/detail" method="post" autocomplete="off">
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
        <label for="">mulai :</label>
        <input type="datetime-local" name="mulai" id="mulai"><br>
        <label for="">selesai:</label>
        <input type="datetime-local" name="selesai" id="selesai"><br>
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
                <td>angkatan</td>
                <td>waktu mulai</td>
                <td>waktu selesai</td>
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
                <td><?= $soal['angkatan'] ?></td>
                <td><?= $soal['mulai'] ?></td>
                <td><?= $soal['selesai'] ?></td>
                <td><a href="/dosen/soal/hapus-soal/<?=$soal['id_soal']?>/<?=$soal['judul']?>">hapus</a> | edit</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>