<?php
include_once('../_header.php');
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['tambah'])) {
    $uuid = Uuid::uuid4()->toString();
    $pasien = trim(mysqli_real_escape_string($koneksi, $_POST['pasien']));
    $keluhan = trim(mysqli_real_escape_string($koneksi, $_POST['keluhan']));
    $dokter = trim(mysqli_real_escape_string($koneksi, $_POST['dokter']));
    $diagnosa = trim(mysqli_real_escape_string($koneksi, $_POST['diagnosa']));
    $poli = trim(mysqli_real_escape_string($koneksi, $_POST['poli']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));

    $obat = $_POST['obat'];

    mysqli_query($koneksi, "INSERT INTO rekam_medis (id_rm, id_pasien, keluhan, id_dokter, diagnosa, id_poli, tgl_periksa) 
                            VALUES ('$uuid', '$pasien', '$keluhan', '$dokter', '$diagnosa', '$poli', '$tanggal')") or die (mysqli_error($koneksi));
    foreach ($obat as $ob) {
        mysqli_query($koneksi, "INSERT INTO rm_obat (id_rm, id_obat)
                            VALUES ('$uuid', '$ob')") or die (mysqli_error($koneksi));
    }
    echo "<script>window.location='data.php';</script>";
} 

?>
