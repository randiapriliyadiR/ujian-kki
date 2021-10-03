<?php 
$csrf = new CSRF();
$modeldosen = new Dosen;
$modelmahasiswa = new Mahasiswa;
if(isset($_POST['login'])){
    if ($csrf->validate('login-mahasiswa')) {
        $nim=bersih($_POST['nim']);
        $password=bersih($_POST['password']);
        $login=$modelmahasiswa->loginMahasiswa($nim);
        print_r($login);
        if (password_verify($password, $login['password'])) {
            $_SESSION['ID']=kue('enkripsi',$nim);
            $_SESSION['level']=kue('enkripsi','mahasiswa');
            header('Location: /mahasiswa');
        } else {
            echo 'Invalid password.';
        }
    }elseif($csrf->validate('login-dosen')){
        echo "NIDN: ".$_POST['nidn'];
        echo '<br>';
        echo "NIDN yang dienkripsi: ".kue('enkripsi',$_POST['nidn']);
        echo '<br>';
        echo "password: ".$_POST['password'];
        echo '<br>';
        $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
        echo "password yang sudah di hash: ".$pass;
        echo '<br>';
        echo strlen($pass);
    }
    else {
        echo "kode csrf salah";
    }
}
?>

<title>login</title>
<h1>login mahasiswa</h1>
<form action="" method="POST" autocomplete="off">
    <?=$csrf->input('login-mahasiswa');?>
    <input type="text" name="nim" id="nim" placeholder="NIM" autocomplete="off"><br/>
    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off"><br/>
    <input type="submit" value="Masuk" name="login">
</form>
<br>
<br>
<h1>login dosen</h1>
<form action="" method="POST" autocomplete="off">
    <?=$csrf->input('login-dosen');?>
    <input type="text" name="nidn" id="nidn" placeholder="NIDN" autocomplete="off"><br/>
    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off"><br/>
    <input type="submit" value="Masuk" name="login">
</form>