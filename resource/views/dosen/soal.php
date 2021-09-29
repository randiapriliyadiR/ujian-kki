<?php
if(isset($_GET['pg']) OR isset($_GET['isian']) OR isset($_GET['esai'])){
    echo $_GET['pg'];
    echo $_GET['isian'];
    echo $_GET['esai'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soal</title>
</head>
<body>
    <form action="#" method="get">
        <input type="number" name="pg" id="pg" value="0">
        <input type="number" name="isian" id="isian" value="0">
        <input type="number" name="esai" id="esai" value="0">
        <input type="submit" value="buatkan">
    </form>
    <br><br>
    <form action="" method="post">
        <input type="text" name="pg" id="pg" placeholder="pernyataan"><br>
        <input type="text" name="a" id="a" placeholder="a">
        <input type="text" name="b" id="b" placeholder="b">
        <input type="text" name="c" id="c" placeholder="c">
        <input type="text" name="d" id="d" placeholder="pernyataan">
    </form>
</body>
</html>