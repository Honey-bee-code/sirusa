<?php 
include_once('../_header.php');

$chek = $_POST['pilih'];
if(!isset($chek)) {
    echo "<script>alert('Tidak ada data yang dipilih!'); window.location='data.php'</script>";
} else {
    foreach($chek as $id) {
        $sql = mysqli_query($koneksi, "DELETE FROM poliklinik WHERE id_poli = '$id'") or die (mysqli_error($koneksi));
    }
    if($sql){
        echo "<script>alert('".count($chek)." data berhasil dihapus');window.location='data.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data, silahkan coba lagi');window.location='data.php';</script>";
    }
}
?>