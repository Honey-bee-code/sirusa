<?php
date_default_timezone_set('Asia/Makassar');
session_start();

$koneksi = mysqli_connect('localhost', 'root', '', 'sirusa');
if(mysqli_connect_errno()) {
    echo mysqli_connect_error();
} 


function base_url($url = null) {
    $base_url = "http://localhost/sirusa";
    // $base_url = "http://192.168.43.54/sirusa";
    if($url != null) {
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}

?>