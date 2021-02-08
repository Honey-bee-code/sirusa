<?php include_once('../_header.php');?>

<div class="box">
    <h1>Dokter</h1>
    <h4>
        <small>Data Dokter</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
            <a href="tambah.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Dokter</a>
        </div>
    </h4>
    <form action="" method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center" width="75px">
                            <input type="checkbox" class="pilih_semua" value="">
                        </th>
                        <th width="20px">No.</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th class="text-center"><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    $sql_dokter = mysqli_query($koneksi, "SELECT * FROM dokter") or die (mysqli_error($koneksi));
                    while($data = mysqli_fetch_array($sql_dokter)) { ?>
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" name="pilih[]" class="pilih" value="<?=$data['id_dokter']?>">
                        </td>
                        <td><?=$no++?></td>
                        <td><?=$data['nama_dokter']?></td>
                        <td><?=$data['spesialis']?></td>
                        <td><?=$data['alamat']?></td>
                        <td><?=$data['no_hp']?></td>
                        <td align="center">
                            <a href="edit.php?id=<?=$data['id_dokter']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
    <div class="box">
        <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.pilih_semua').on('click', function() {
            if(this.checked) {
                $('.pilih').each(function() {
                    this.checked = true
                })
            } else {
                $('.pilih').each(function() {
                    this.checked = false
                })
            }
        })
        $('.pilih').on('click', function() {
            if($('.pilih:checked').length == $('.pilih').length) {
                $('.pilih_semua').prop('checked', true)
            } else {
                $('.pilih_semua').prop('checked', false)
            }
        })
    })

    function hapus() {
        var konf = confirm('Yakin akan menghapus data?')
        if(konf){
            document.proses.action = 'hapus.php'
            document.proses.submit()
        }
    }
</script>

<?php include_once('../_footer.php');?>