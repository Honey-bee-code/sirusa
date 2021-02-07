<?php include_once('../_header.php');?>

<div class="box">
    <h1>Obat</h1>
    <h4>
        <small>Data Obat</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
            <a href="tambah.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Obat</a>
        </div>
    </h4>
    <div style="margin-bottom:  10px">
        <form action="" class="form-inline" method="post">
            <div class="form-group">
                <input type="text" name="cari" class="form-control" placeholder="Cari obat ...">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th width="20px">No.</th>
                    <th>Nama Obat</th>
                    <th>Keterangan</th>
                    <th class="text-center" width="150px"><i class="glyphicon glyphicon-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $batas = 3;
                $halaman = @$_GET['hal'];
                if(empty($halaman)) {
                    $posisi = 0;
                    $halaman = 1;
                } else {
                    $posisi = ($halaman - 1) * $batas;
                }
                $no = 1;
                // REQUEST_METHOD artinya jika button cari diklik
                if($_SERVER['REQUEST_METHOD'] == "POST") {
                    $cari = trim(mysqli_real_escape_string($koneksi, $_POST['cari']));
                    if($cari != '') {
                        $sql = "SELECT * FROM obat WHERE nama_obat LIKE '%$cari%'";
                        $query = $sql;
                        $queryJml = $sql;
                    } else {
                        $query = "SELECT * FROM obat LIMIT $posisi, $batas";
                        $queryJml = "SELECT * FROM obat";
                        $no = $posisi + 1;
                    }
                } else {
                    $query = "SELECT * FROM obat LIMIT $posisi, $batas";
                    $queryJml = "SELECT * FROM obat";
                    $no = $posisi + 1;
                }

                $sql_obat = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
                if(mysqli_num_rows($sql_obat) > 0){ 
                    while($data = mysqli_fetch_array($sql_obat)) { ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data['nama_obat']?></td>
                        <td><?=$data['ket_obat']?></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?=$data['id_obat']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <a href="hapus.php?id=<?=$data['id_obat']?>" onclick="return confirm('Yakin akan menghapus data ini?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php } 
                } else { ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data obat..!</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
    if($_POST['cari'] != '') {
        echo "<div style=\"float:left;\">";
        $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJml));
        echo "Data Hasil Pencarian : <b>$jml</b>";
        echo "</div>";
    } else { ?>
        <div style="float:left;">
            <?php
            $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJml));
            echo "Jumlah Data : <b>$jml</b>";
            ?>
        </div>
        <div style="float:right;">
            <ul class="pagination pagination-sm" style="margin:0">
                <?php
                $jml_hal = ceil($jml / $batas);
                for($i=1; $i <= $jml_hal; $i++) {
                    if($i != $halaman) {
                        echo "<li><a href=\"?hal=$i\">$i</a></li>";
                    } else {
                        echo "<li class=\"active\"><a>$i</a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    <?php
    }
    ?>
</div>

<?php include_once('../_footer.php');?>