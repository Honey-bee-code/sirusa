<?php
include_once('../_header.php');
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['tambah'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $ket = trim(mysqli_real_escape_string($koneksi, $_POST['ket']));
    mysqli_query($koneksi, "INSERT INTO obat (id_obat, nama_obat, ket_obat) VALUES ('$uuid', '$nama', '$ket')") or die (mysqli_error($koneksi));
    echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $ket = trim(mysqli_real_escape_string($koneksi, $_POST['ket']));
    mysqli_query($koneksi, "UPDATE obat SET nama_obat = '$nama', ket_obat = '$ket' WHERE id_obat = '$id'") or die (mysqli_error($koneksi));
    echo "<script>window.location='data.php';</script>";
} else {
    echo "<script>window.location='data.php';</script>";
}

?>
