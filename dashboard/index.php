<?php include_once('../_header.php');?>
<div class="row">
    <div class="col-lg-12">
        <h1>Dashboard</h1>
        <p>Selamat Datang <b><?=ucfirst($_SESSION['nama_user'])?></b> di Aplikasi Sistem Rumah Sakit (SiRuSa)</p>
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
    </div>
</div>
<?php include_once('../_footer.php');?>