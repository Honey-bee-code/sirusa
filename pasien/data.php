<?php include_once('../_header.php');?>
<div class="box">
    <h1>Pasien</h1>
    <h4>
        <small>Data Pasien</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
            <a href="tambah.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Pasien</a>
        </div>
    </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tabel-pasien">
                <thead>
                    <tr>
                        <!-- <th width="20px">No.</th> -->
                        <th>Nomor Identitas</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th class="text-center"><i class="glyphicon glyphicon-cog"></i> Opsi</th>
                    </tr>
                </thead>
                
            </table>
        </div>
<script src="../_assets/libs/DataTables/Buttons-1.6.5/js/buttons.colVis.min.js"></script>
<script src="../_assets/libs/DataTables/Buttons-1.6.5/js/dataTables.buttons.min.js"></script>
<script>
        $(document).ready(function() {

            $('#tabel-pasien').DataTable( {
                // "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                "processing": true,
                "serverSide": true,
                "ajax": "data_json.php",
                scrollY : '250px',
                dom : 'Bfrtip',
                lengthMenu: [
                    [ 5, 10, 25, 50, -1 ],
                    [ '5 baris', '10 baris', '25 baris', '50 baris', 'Tampilkan semua' ]
                ],
                buttons : [
                    {
                        text: 'Cetak pdf',
                        extend : 'pdf',
                        orientation : 'potrait',
                        pageSize : 'Legal',
                        title : 'Data Pasien',
                        download : 'open',
                    },
                    {
                        text: 'Cetak',
                        extend: 'print',
                        exportOptions: { columns: ':visible' },
                        title : 'Data Pasien'
                    },
                    'csv', 'excel', 'copy',
                    {
                        text: 'Tampil kolom',
                        extend: 'colvis',
                    },
                    {
                        text: 'Tampil semua kolom',
                        extend: 'colvisRestore',
                    },
                    {
                        text: 'Tampil baris',
                        extend: 'pageLength',
                    },
                    'columnsToggle'
                ],
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : 5,
                        "render" : function(data, type, row){
                            var btn = "<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i> Edit</a> <a href=\"hapus.php?id="+data+"\" onclick=\"return confirm('Yakin akan menghapus data ini?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a></center>"
                            return btn
                        }
                    },
                    // { targets : -1, visible: false }
                ],
                language : 
                    {
                        "decimal":        "",
                        "emptyTable":     "No data available in table",
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
                
            } );
        } );
    </script>
</div>

<?php include_once('../_footer.php');?>
