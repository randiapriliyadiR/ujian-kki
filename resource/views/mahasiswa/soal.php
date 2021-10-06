<?php
$namafile=kue('enkripsi','engres');
$file='resource/data/'.$namafile.'.json';
$anggota=file_get_contents($file);
$data=json_decode($anggota,true);
// print_r($data);
$now = new DateTime();
$sekarang = $now->format('Y-m-d H:i:s');
$mulai = "2021-10-03 11:17:23";
$selesai = "2021-10-05 11:17:23";
$date1 = DateTime::createFromFormat('Y-m-d H:i:s', $sekarang);
$date2 = DateTime::createFromFormat('Y-m-d H:i:s', $mulai);
$date3 = DateTime::createFromFormat('Y-m-d H:i:s', $selesai);
if ($date1 > $date2 && $date1 < $date3)
{
    echo "bisa";
}else{
    echo "gabisa";
}
?>
<h1><?=kue('dekripsi',$_SESSION['ID']);?></h1>
    <h1><?=kue('dekripsi',$_SESSION['KEY']);?></h1>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script>
    var format = 'hh:mm:ss'
    // var time = moment() gives you current time. no format required.
    var time = moment('09:34:00', format),
        beforeTime = moment('08:34:00', format),
        afterTime = moment('10:34:00', format);
    if (time.isBetween(beforeTime, afterTime)) {
        console.log('is between')
    } else {
        console.log('is not between')
    }
</script> -->