<?php
include_once('../_header.php');
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['tambah'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $spesialis = trim(mysqli_real_escape_string($koneksi, $_POST['spesialis']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($koneksi, $_POST['telp']));
    mysqli_query($koneksi, "INSERT INTO dokter (id_dokter, nama_dokter, spesialis, alamat, no_hp) 
                            VALUES ('$uuid', '$nama', '$spesialis', '$alamat', '$telp')") or die (mysqli_error($koneksi));
    echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $spesialis = trim(mysqli_real_escape_string($koneksi, $_POST['spesialis']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($koneksi, $_POST['telp']));
    mysqli_query($koneksi, "UPDATE dokter SET nama_dokter = '$nama', spesialis = '$spesialis',
                alamat = '$alamat', no_hp = '$telp' WHERE id_dokter = '$id'") or die (mysqli_error($koneksi));
    echo "<script>window.location='data.php';</script>";
} else {
    echo "<script>window.location='data.php';</script>";
}

?>
