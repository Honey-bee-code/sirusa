<?php
require_once "_config/config.php";
if(isset($_SESSION['user'])) { ?>
    Silahkan <a href="auth/logout.php">Keluar</a>
<?php
} else {
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
}
?> 

