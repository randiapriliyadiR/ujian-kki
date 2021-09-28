<?php
namespace App\Controllers;
class Guest{
    function notfound(){
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '404, route not found!';
    }
    function index(){
        view('login');
    }
}