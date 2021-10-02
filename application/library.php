<?php
// asset
function assets($url){
    $ubah='http://localhost/ujian-kki/resource/'.$url;
    return $ubah;
}
// view
function view($url){
    $ubah=str_replace('.','/',$url);
    $include= include('resource/views/'.$ubah.'.php');
    return $include;
}

// html purifier
function bersih($string){
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $clean_html = $purifier->purify($string);
    return $clean_html;
}


// enkripsi dan dekripsi
function kue($encrypt_decrypt,$string){
    $password = md5('kki kelompok 1');
    $method = 'aes-128-cbc';
    $iv = substr(hash('sha256', $password), 0, 16);
    $output='';
    if($encrypt_decrypt=='enkripsi'){
        $output = openssl_encrypt($string, $method, $password, 0, $iv);
        $output = base64_encode($output);
   } else if($encrypt_decrypt=='dekripsi'){
        $output = base64_decode($string);
        $output = openssl_decrypt($output, $method, $password, 0, $iv);
   }
   return $output;
}
// $teks='contoh enkripsi!';
// $enc = kue('enkripsi',$teks);
// $dec = kue('dekripsi',$enc);
// echo "$enc \n$dec";

// mengambil ip address
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
    //whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}
// $ip = getIPAddress();

// Start or Resume a session
session_start();

// In case one is using PHP 5.4's built-in server
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}
// Create a Router
$router = new \Bramus\Router\Router();
// $router->setBasePath('/');