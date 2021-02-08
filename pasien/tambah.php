<?php
include_once('../_header.php');
?>

<div class="box">
<h1>Pasien</h1>
    <h4>
        <small>Tambah Data Pasien</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="no_id">Nomor Identitas</label>
                    <input type="text" name="no_id" class="form-control" required autofocus>
                </div>    
                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="jenkel">Jenis Kelamin</label>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="jenkel" value="L" required> Laki-laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="jenkel" value="P"> Perempuan
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="telp">No. Telepon</label>
                    <input type="text" name="telp" class="form-control" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="tambah" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_header.php'); ?>