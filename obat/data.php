<?php include_once('../_header.php');?>

<div class="box">
    <h1>Obat</h1>
    <h4>
        <small>Data Obat</small>
    </h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th width="20px">No.</th>
                    <th>Nama Obat</th>
                    <th>Keterangan</th>
                    <th class="text-center"><i class="glyphicon glyphicon-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $sql_obat = mysqli_query($koneksi, "SELECT * FROM obat") or die (mysqli_error($koneksi));
                if(mysqli_num_rows($sql_obat) > 0){ 
                    while($data = mysqli_fetch_array($sql_obat)) { ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data['nama_obat']?></td>
                        <td><?=$data['ket_obat']?></td>
                        <td></td>
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
</div>

<?php include_once('../_footer.php');?>