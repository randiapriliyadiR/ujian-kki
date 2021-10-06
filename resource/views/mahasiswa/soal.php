<?php
// json
$namafile=kue('enkripsi','judul');$file='resource/data/'.$namafile.'.json';$anggota=file_get_contents($file);$data=json_decode($anggota,true);
echo '<br>';
shuffle($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soal</title>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("<?='Oct 6, 2021 17:59:00';?>").getTime();
        // Update the count down every 1 second
        var x = setInterval(function () {
            // Get today's date and time
            var now = new Date().getTime();
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Output the result in an element with id="waktu"
            document.getElementById("waktu").innerHTML = days + "hari " + hours + "jam " +
                minutes + "menit " + seconds + "detik ";
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("waktu").innerHTML = "EXPIRED";
                window.location = "/mahasiswa";
            }
        }, 1000);
    </script>
</head>
<body>
<p id="waktu"></p>
<?php 
    $no=1;
    foreach($data as $soal){
    if($soal['jenis']=='pg'){?>
        <p><?=$no++;?>. <?=$soal['pertanyaan'];?></p>
        <p>A.<input type="radio" name="<?=$soal['id']?>['jawaban']" id="" value="a"><?= $soal['a']; ?></p>
        <p>B.<input type="radio" name="<?=$soal['id']?>['jawaban']" id="" value="b"><?= $soal['b']; ?></p>
        <p>C.<input type="radio" name="<?=$soal['id']?>['jawaban']" id="" value="c"><?= $soal['c']; ?></p>
        <p>D.<input type="radio" name="<?=$soal['id']?>['jawaban']" id="" value="d"><?= $soal['d']; ?></p>
    <?php
    }elseif($soal['jenis']=='isian'){?>
        <p><?=$no++;?>. <?=$soal['pertanyaan'];?> <input type="text" name="" id=""></p>
    <?php
    }elseif($soal['jenis']=='esai'){?>
        <p><?=$no++;?>. <?=$soal['pertanyaan'];?></p>
        <p><textarea name="" id="" cols="30" rows="10"></textarea></p>
    <?php } ?>
<?php } ?>
</body>
</html>