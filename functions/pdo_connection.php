<?php 
// address localhost
$address = "http://localhost/adidas/";
define("BASE_URL", $address);

// redirect
function redirect($url){
    header('Location:'. trim(BASE_URL,'/ '). '/' . trim($url, '/ '));
    exit;
}

// asset
function asset($file){
    return trim(BASE_URL, '/ '). '/' .trim($file, '/ ');
}

// url 
function url($url){
    return trim(BASE_URL, '/ '). '/' .trim($url, '/ ');
}

// veiw 
function dd($var){
    echo '<pre>';
    var_dump($var);
    exit;
}



?>
