<?php
include_once('../_header.php');
?>

<div class="box">
<h1>Pasien</h1>
    <h4>
        <small>Edit Data Pasien</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
            $id = $_GET['id'];
            $sql_pasien = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien = '$id'") or die (mysqli_error($koneksi));
            $data = mysqli_fetch_array($sql_pasien);
            ?>
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="no_id">Nomor Identitas</label>
                    <input type="hidden" name="id" value="<?=$data['id_pasien']?>">
                    <input type="text" name="no_id" class="form-control" value="<?=$data['nomor_identitas']?>" required autofocus>
                </div>    
                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" name="nama" class="form-control" value="<?=$data['nama_pasien']?>" required>
                </div>
                <div class="form-group">
                    <label for="jenkel">Jenis Kelamin</label>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="jenkel" value="L" <?=$data['jenis_kelamin'] == "L" ? "checked" : null?> required> Laki-laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="jenkel" value="P" <?=$data['jenis_kelamin'] == "P" ? "checked" : null?> > Perempuan
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" required><?=$data['alamat']?></textarea>
                </div>
                <div class="form-group">
                    <label for="telp">No. Telepon</label>
                    <input type="text" name="telp" class="form-control" value="<?=$data['no_hp']?>" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_header.php'); ?>