<?php 
$csrf = new CSRF();
if(isset($_POST['login'])){
    if ($csrf->validate('login-mahasiswa')) {
        echo "nomor induk: ".$_POST['no_induk'];
        echo '<br>';
        echo "nomor induk yang dienkripsi: ".kue('enkripsi',$_POST['no_induk']);
        echo '<br>';
        echo "password: ".$_POST['password'];
        echo '<br>';
        $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
        echo "password yang sudah di hash: ".$pass;
        echo '<br>';
        echo strlen($pass);
    }elseif($csrf->validate('login-dosen')){
        echo "nomor induk: ".$_POST['no_induk'];
        echo '<br>';
        echo "nomor induk yang dienkripsi: ".kue('enkripsi',$_POST['no_induk']);
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
    <input type="text" name="no_induk" id="no_induk" placeholder="No Induk" autocomplete="off"><br/>
    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off"><br/>
    <input type="submit" value="Masuk" name="login">
</form>
<br>
<br>
<h1>login dosen</h1>
<form action="" method="POST" autocomplete="off">
    <?=$csrf->input('login-dosen');?>
    <input type="text" name="no_induk" id="no_induk" placeholder="No Induk" autocomplete="off"><br/>
    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off"><br/>
    <input type="submit" value="Masuk" name="login">
</form>