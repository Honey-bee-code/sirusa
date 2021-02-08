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
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="20px">No.</th>
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
    
</div>

<?php include_once('../_footer.php');?>