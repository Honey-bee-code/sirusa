<?php
// include_once('../_header.php');
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['tambah'])) {
    $uuid = Uuid::uuid4()->toString();
    $no_id = trim(mysqli_real_escape_string($koneksi, $_POST['no_id']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $jenkel = trim(mysqli_real_escape_string($koneksi, $_POST['jenkel']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($koneksi, $_POST['telp']));
    //validasi nomor_identitas tidak boleh sama
    $cek_no_id = mysqli_query($koneksi, "SELECT * FROM pasien WHERE nomor_identitas = '$no_id'") or die (mysqli_error($koneksi));
    if(mysqli_num_rows($cek_no_id) > 0) {
        echo "<script>alert('Nomor Identitas sudah pernah digunakan!');window.location='tambah.php';</script>";
    } else {
        mysqli_query($koneksi, "INSERT INTO pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_hp) 
                                VALUES ('$uuid', '$no_id', '$nama', '$jenkel', '$alamat', '$telp')") or die (mysqli_error($koneksi));
        echo "<script>window.location='data.php';</script>";
    }
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $no_id = trim(mysqli_real_escape_string($koneksi, $_POST['no_id']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $jenkel = trim(mysqli_real_escape_string($koneksi, $_POST['jenkel']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($koneksi, $_POST['telp']));
    //validasi nomor_identitas tidak boleh sama
    $cek_no_id = mysqli_query($koneksi, "SELECT * FROM pasien WHERE nomor_identitas = '$no_id' AND id_pasien != '$id'") or die (mysqli_error($koneksi));
    if(mysqli_num_rows($cek_no_id) > 0) {
        echo "<script>alert('Nomor Identitas sudah pernah digunakan!');window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($koneksi, "UPDATE pasien SET nomor_identitas = '$no_id', nama_pasien = '$nama', jenis_kelamin = '$jenkel',
                    alamat = '$alamat', no_hp = '$telp' WHERE id_pasien = '$id'") or die (mysqli_error($koneksi));
        echo "<script>window.location='data.php';</script>";
    }
} else if(isset($_POST['import'])){
    $file = $_FILES['file']['name'];
    $ektensi = explode(".", $file);
    $file_name = "file-".round(microtime(true)).".".end($ektensi);
    $sumber = $_FILES['file']['tmp_name'];
    $target_dir = "../_file/";
    $target_file = $target_dir.$file_name;
    move_uploaded_file($sumber, $target_file);
    
    // $obj = PHPExcel_IOFactory::load($target_file);
    // $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);
    

    unlink($target_file);
} 
// else {
//     echo "<script>window.location='data.php';</script>";
// }

?>
