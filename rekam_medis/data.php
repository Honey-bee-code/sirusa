<?php include_once('../_header.php');?>
<div class="box">
    <h1>Rekam Medis</h1>
    <h4>
        <small>Data Rekam Medis</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
            <a href="tambah.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Rekam Medis</a>
        </div>
    </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tabel">
                <thead>
                    <tr>
                        <th width="20px">No.</th>
                        <th>Tanggal Periksa</th>
                        <th>Nama Pasien</th>
                        <th>Keluhan</th>
                        <th>Nama Dokter</th>
                        <th>Diagnosa</th>
                        <th>Poliklinik</th>
                        <th>Data Obat</th>
                        <th class="text-center"><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = "SELECT * FROM rekam_medis 
                    INNER JOIN pasien ON rekam_medis.id_pasien = pasien.id_pasien
                    INNER JOIN dokter ON rekam_medis.id_dokter = dokter.id_dokter
                    INNER JOIN poliklinik ON rekam_medis.id_poli = poliklinik.id_poli";
                    $sql_rm = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
                    while($data = mysqli_fetch_array($sql_rm)){ ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=indo_date($data['tgl_periksa'])?></td>
                        <td><?=$data['nama_pasien']?></td>
                        <td><?=$data['keluhan']?></td>
                        <td><?=$data['nama_dokter']?></td>
                        <td><?=$data['diagnosa']?></td>
                        <td><?=$data['nama_poli']?></td>
                        <td>
                        <?php
                        $sql_obat = mysqli_query($koneksi, "SELECT * FROM rm_obat 
                        JOIN obat ON rm_obat.id_obat = obat.id_obat WHERE id_rm = '$data[id_rm]'") 
                        or die (mysqli_error($koneksi));
                        while($data_obat = mysqli_fetch_array($sql_obat)) {
                            echo $data_obat['nama_obat']."<br>";
                        }
                        ?>
                        </td>
                        <td>
                            <a href="hapus.php?id=<?=$data['id_rm']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabel').DataTable({
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
            columnDefs: [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 8
                }
            ],
            order: [1, "asc"],
            language : 
                    {
                        "decimal":        "",
                        "emptyTable":     "Tidak ada data !",
                        "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ jumlah data",
                        "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 data",
                        "infoFiltered":   "(filtered from _MAX_ total entries)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "Tampilkan _MENU_ data",
                        "loadingRecords": "Memuat...",
                        "processing":     "Sedang memproses...",
                        "search":         "Search:",
                        "zeroRecords":    "No matching records found",
                        "paginate": {
                            "first":      "Awal",
                            "last":       "Akhir",
                            "next":       "Sesudahnya",
                            "previous":   "Sebelumnya"
                        },
                        "aria": {
                            "sortAscending":  ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        }
                    }
        })
    })
</script>
<?php include_once('../_footer.php');?>