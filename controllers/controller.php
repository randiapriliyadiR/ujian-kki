<?php
namespace App\Controllers;
class Application{
    function notfound(){
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '404, route not found!';
    }
}
include 'MahasiswaController.php';