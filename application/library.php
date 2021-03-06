<?php
// zona waktu
$result = setlocale (LC_ALL, 'IND');

if($result === false){
    throw new \RuntimeException(
        'Got error changing locale, check if locale is installed on the system'
    );
}
date_default_timezone_set("Asia/Jakarta");
// format hari
function formathari($hari){
	// date("D");
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
		case 'Mon':			
			$hari_ini = "Senin";
		break;
		case 'Tue':
			$hari_ini = "Selasa";
		break;
		case 'Wed':
			$hari_ini = "Rabu";
		break;
		case 'Thu':
			$hari_ini = "Kamis";
		break;
		case 'Fri':
			$hari_ini = "Jumat";
		break;
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
	return $hari_ini;
}
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
    $password = md5('kki informatika komputer 2019 kelompok 1');
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