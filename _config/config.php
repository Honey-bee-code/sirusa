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

function indo_date($tgl) {
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    return $tanggal."/".$bulan."/".$tahun;
}

?>