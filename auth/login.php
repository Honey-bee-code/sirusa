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
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div align="center" style="margin-top: 200px">
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
</body>
</html>
