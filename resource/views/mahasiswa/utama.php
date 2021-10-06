<?php 
$dateTime = new DateTime();
$modelmahasiswa = new Mahasiswa();
$modelsoal = new Soal();

$sekarang = $dateTime->format('Y-m-d H:i:s');
$mulai = "2021-10-03 11:17:23";
$selesai = "2021-10-04 11:17:23";
$sekarang = DateTime::createFromFormat('Y-m-d H:i:s', $sekarang);
$mulai = DateTime::createFromFormat('Y-m-d H:i:s', $mulai);
$selesai = DateTime::createFromFormat('Y-m-d H:i:s', $selesai);
$nim=kue('dekripsi',$_SESSION['ID']);
$dataMhs=$modelmahasiswa->dataMahasiswa($nim);
$id_prodi=$dataMhs['id_prodi'];
$angkatan=$dataMhs['angkatan'];
$dataSoal=$modelsoal->tampilSoal($id_prodi,$angkatan);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mahasiswa</title>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script> -->
</head>
<body>
    <?php print_r($dataSoal); ?>
    <h1><?=kue('dekripsi',$_SESSION['ID']);?></h1>
    <h1><?=kue('dekripsi',$_SESSION['KEY']);?></h1>
    <br>
    <center><h1><?=$dataSoal['judul'];?></h1></center>
    <p><?=$dataSoal['namaprodi'];?> <?=$dataSoal['angkatan'];?> | <?=formathari(date("D", strtotime($dataSoal['mulai'])));?>, <?= date("M Y", strtotime($dataSoal['mulai'])); ?></p>
    <hr>
    <p>bobot soal:</p>
    <p>pilihan ganda : 20, isian : 5, esai 5</p>
    <p>keterangan</p>
    <center>
        <?php
            if($sekarang > $mulai && $sekarang < $selesai){
                echo '<button>mulai</button>';
            }else{
                echo '<button disabled="disabled">waktu habis</button>';
            }
        ?>
    </center>
</body>
</html>