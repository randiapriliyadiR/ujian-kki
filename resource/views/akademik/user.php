<?php
$csrf = new CSRF();
$modelmahasiswa = new Mahasiswa;
$modeldosen = new Dosen;
$modelkelas = new Kelas;

if(isset($_POST['tambah-user'])){
    if ($csrf->validate('tambah-mahasiswa')) {
        $idmahasiswa=$modelmahasiswa->viewIdMahasiswa();
        $id_mhs = isset($idmahasiswa['id_mhs']) ? $idmahasiswa['id_mhs']+1 : 1;
        $nim    =bersih($_POST['nim']);
        $nama   =bersih($_POST['nama']);
        $pass   =password_hash(bersih($_POST['password']),PASSWORD_DEFAULT);
        $id_kls =bersih($_POST['id_kelas']);
        $email  =bersih($_POST['email']);
        $telp   =bersih($_POST['telp']);
        $jk     =bersih($_POST['jenis_kelamin']);
        $cek=$modelmahasiswa->inputMahasiswa($id_mhs,$nim,$nama,$pass,$id_kls,$email,$telp,$jk);  
    }elseif($csrf->validate('tambah-dosen')){
        $iddosen=$modeldosen->viewIdDosen();
        $id_dosen = isset($iddosen['id_dosen']) ? $iddosen['id_dosen']+1 : 1;
        $nidn=bersih($_POST['nidn']);
        $nama=bersih($_POST['nama']);
        $password=password_hash(bersih($_POST['password']),PASSWORD_DEFAULT);
        $email=bersih($_POST['email']);
        $telp=bersih($_POST['telp']);
        $level=bersih($_POST['level']);
        $cek=$modeldosen->inputDosen($id_dosen, $nidn, $nama, $password, $email, $telp, $level); 
    }
    else {
        echo "kode csrf salah";
    }
}
?>
<!-- ================================================================================================== -->
<!-- ======================                     pembatas                     ========================== -->
<!-- ================================================================================================== -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
</head>

<body>
    <h1>tambah dosen</h1>
    <form action="#" method="post" autocomplete="off">
        <?=$csrf->input('tambah-dosen');?>
        <input type="text" name="nidn" id="nidn" placeholder="NIDN" autocomplete="off"><br>
        <input type="text" name="nama" id="nama" placeholder="nama" autocomplete="off"><br>
        <input type="password" name="password" id="password" placeholder="password" autocomplete="off"><br>
        <input type="email" name="email" id="email" placeholder="email" autocomplete="off"><br>
        <input type="tel" name="telp" id="telp" placeholder="no telepon" autocomplete="off"><br>
        <select name="level" id="level">
            <option value="akademik">Akademik</option>
            <option value="dosen">Dosen</option>
        </select><br>
        <input type="submit" value="Tambahkan" name="tambah-user">
    </form>
    <br><br>
    <h1>tambah mahasiswa</h1>
    <form action="#" method="post" autocomplete="off">
        <?=$csrf->input('tambah-mahasiswa');?>
        <input type="text" name="nim" id="nim" placeholder="NIM" autocomplete="off"><br>
        <input type="text" name="nama" id="nama" placeholder="nama" autocomplete="off"><br>
        <input type="password" name="password" id="password" placeholder="password" autocomplete="off"><br>
        <select name="id_kelas" id="id_kelas">
            <?php foreach($modelkelas->viewKelas() as $kelas){ ?>
                <option value="<?= $kelas['id_kelas']?>"><?= $kelas['nama']?></option>
            <?php } ?>
        </select><br>
        <input type="email" name="email" id="email" placeholder="email" autocomplete="off"><br>
        <input type="tel" name="telp" id="telp" placeholder="no telepon" autocomplete="off"><br>
        <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki"><label
            for="jenis_kelamin">laki-laki</label>
        <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan"><label
            for="jenis_kelamin">perempuan</label><br>
        <input type="submit" value="Tambahkan" name="tambah-user">
    </form>
    <br><br>
    <h1>table mahasiswa</h1>
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>NIM</td>
                <td>nama</td>
                <td>kelas</td>
                <td>email</td>
                <td>telp</td>
                <td>level</td>
                <td>opsi</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($modelmahasiswa->viewMahasiswa() as $mahasiswa){ ?>
            <tr>
                <td><?= $mahasiswa['id_mhs'] ?></td>
                <td><?= $mahasiswa['nim'] ?></td>
                <td><?= $mahasiswa['nama'] ?></td>
                <td><?= $mahasiswa['nama_kelas'] ?></td>
                <td><?= $mahasiswa['email'] ?></td>
                <td><?= $mahasiswa['telp'] ?></td>
                <td><?= $mahasiswa['jenis_kelamin'] ?></td>
                <td><a href="/akademik/hapus-user/mahasiswa/<?= $mahasiswa['id_mhs'] ?>">hapus</a> | edit</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>
    <h1>table dosen</h1>
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>NIDN</td>
                <td>nama</td>
                <td>email</td>
                <td>telp</td>
                <td>level</td>
                <td>opsi</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($modeldosen->viewDosen() as $dosen){ ?>
            <tr>
                <td><?= $dosen['id_dosen'] ?></td>
                <td><?= $dosen['nidn'] ?></td>
                <td><?= $dosen['nama'] ?></td>
                <td><?= $dosen['email'] ?></td>
                <td><?= $dosen['telp'] ?></td>
                <td><?= $dosen['level'] ?></td>
                <td><a href="/akademik/hapus-user/dosen/<?= $dosen['id_dosen'] ?>">hapus</a> | edit</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>