<?php
require_once "../_config/config.php";
if(isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url()."';</script>";
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
    <title>Login - SiRuSa</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('_assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url('_assets/css/simple-sidebar.css')?>" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div align="center" style="margin-top: 200px">
            <?php
            if(isset($_POST['login'])) {
                $user = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
                $password = sha1(trim(mysqli_real_escape_string($koneksi, $_POST['password'])));
                // tambahkan or die sebagai trancking error
                $sql_login = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user' AND password = '$password'") or die (mysqli_error($koneksi));
                if(mysqli_num_rows($sql_login) > 0) {
                    // $_SESSION['user'] = $user; 
                    $qry = mysqli_fetch_array($sql_login);
                    $_SESSION['user'] = $qry['username'];
                    $_SESSION['nama_user'] = $qry['nama_user'];
                    echo "<script>window.location='".base_url()."';</script>";
                } else { ?>
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <div class="alert alert-danger alert-dismissable" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <strong>Login gagal!</strong> Username / Password salah
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
            ?>
            <form action="" method="post" class="navbar-form">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Username..." required autofocus>
                </div>
                <br>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" name="password" placeholder="Password..." class="form-control" required>
                </div>
                <br>
                <br>
                <div class="input-group">
                    <input type="submit" name="login" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>
    </div>
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
</body>
</html>