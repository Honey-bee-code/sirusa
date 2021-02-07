<?php include_once('../_header.php');?>

<div class="box">
    <h1>Poliklinik</h1>
    <h4>
        <small>Data Poliklinik</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
            <a href="tambah.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Poli</a>
        </div>
    </h4>
    <form action="" method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="20px">No.</th>
                        <th>Nama Poli</th>
                        <th>Gedung</th>
                        <th class="text-center" width="150px">
                            <input type="checkbox" class="pilih_semua" value="">
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    $sql_poli = mysqli_query($koneksi, "SELECT * FROM poliklinik") or die (mysqli_error($koneksi));
                    if(mysqli_num_rows($sql_poli) > 0){ 
                        while($data = mysqli_fetch_array($sql_poli)) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data['nama_poli']?></td>
                            <td><?=$data['gedung']?></td>
                            <td class="text-center">
                                <input type="checkbox" name="pilih[]" class="pilih" value="<?=$data['id_poli']?>">
                            </td>
                        </tr>
                    <?php } 
                    } else { ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data poli..!</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
    <div class="box pull-right">
        <button class="btn btn-warning btn-sm" onclick="edit()"><i class="glyphicon glyphicon-edit"></i> Edit</button>
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

    function edit() {
        document.proses.action = 'edit.php'
    }
</script>

<?php include_once('../_footer.php');?>