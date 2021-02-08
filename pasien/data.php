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
                        <th class="text-center"><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                
            </table>
        </div>
    <script>
        $(document).ready(function() {

            $('#tabel-pasien').DataTable( {
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                "processing": true,
                "serverSide": true,
                "ajax": "data_json.php",
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : 5,
                        "render" : function(data, type, row){
                            var btn = "<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i> Edit</a> <a href=\"hapus.php?id="+data+"\" onclick=\"return confirm('Yakin akan menghapus data ini?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a></center>"
                            return btn
                        }
                    }
                ]
            } );
        } );
    </script>
</div>

<?php include_once('../_footer.php');?>