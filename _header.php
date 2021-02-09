<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";

if(!isset($_SESSION['user'])) { 
    echo "<script>window.location='".base_url('auth')."'</script>";
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aplikasi - SiRuSa</title>
    <link href="<?=base_url('_assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('_assets/css/simple-sidebar.css')?>" rel="stylesheet">
    <link href="<?=base_url('_assets/libs/DataTables/datatables.min.css')?>" rel="stylesheet">
    <!-- <link href="<?=base_url('_assets/libs/DataTables/DataTables-1.10.23/css/jquery.dataTables.min.css')?>" rel="stylesheet"> -->
    <!-- <link href="<?=base_url('_assets/libs/DataTables/Buttons-1.6.5/css/buttons.dataTables.min.css')?>" rel="stylesheet"> -->
    <link rel="icon" href="<?=base_url('_assets/css/bee.png')?>">
</head>
<body>
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/DataTables/datatables.min.js')?>"></script>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href=""><span class="text-primary"><b>Sistem Rumah Sakit</b></span></a>
                </li>
                <li>
                    <a href="<?=base_url('dashboard')?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?=base_url('pasien')?>">Data Pasien - ServerSide</a>
                </li>
                <li>
                    <a href="<?=base_url('dokter')?>">Data Dokter - ClientSide</a>
                </li>
                <li>
                    <a href="<?=base_url('poli')?>">Data Poliklinik - CRUD biasa</a>
                </li>
                <li>
                    <a href="<?=base_url('obat')?>">Data Obat - Pencarian Manual</a>
                </li>
                <li>
                    <a href="<?=base_url('rekam_medis')?>">Rekam Medis</a>
                </li>
                <li>
                    <a href="<?=base_url('auth/logout.php')?>"><span class="text-danger">Logout</span></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="glyphicon glyphicon-menu-hamburger"></i> Menu</a>