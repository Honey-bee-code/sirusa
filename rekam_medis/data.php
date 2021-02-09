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
            <table class="table table-striped table-bordered table-hover" id="tabelrm">
                <thead>
                    <tr>
                        <th width="20px">No.</th>
                        <th>Tanggal Periksa</th>
                        <th>Nama Pasien</th>
                        <th>Keluhan</th>
                        <th>Nama Dokter</th>
                        <th class="text-center"><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
</div>
<script>
    $(document).ready(function() {
        $('#tabelrm').DataTable({
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            columnDefs: [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 6]
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
    }
</script>
<?php include_once('../_footer.php');?>