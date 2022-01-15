<?php
    session_start();
    require_once("../models/setup.php");
    $username = isset($_COOKIE["username"]) ? $_COOKIE["username"] : "";
    $password = isset($_COOKIE["password"]) ? $_COOKIE["password"] : "";
    $bg_color = "";
    if (!empty($username) && !empty($password)) {
        $bg_color = "rgb(211, 227, 238)";
    }
    $validate = isValid();
    $area = 0;
    $message = "";
    if ($validate[1] != "" || $validate[2] != "") {
        if ($validate[2] == "Tài khoản không tồn tại") {
            $area = 1;
            $message = $validate[2];
        } else
        if ($validate[2] == "Mật khẩu không chính xác") {
            $area = 2;
            $message = $validate[2];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!--Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--Font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap"
        rel="stylesheet">

    <!--Css-->
    <link rel="stylesheet" href="style.css">

    <!--Javascript-->
    <script src="main.js"></script>
    <title>Đăng nhập</title>
</head>
<body>
    <div class="container-fluid login">
        <div class="wrapper">
            <div class="title1">
                <p>Đăng nhập</p>
            </div>
            <form action="../controllers/login.php" method="POST" class="login" id="login_form" onsubmit="return checkLogin();">
                <div class="field">
                    <label for="">Tên đăng nhập</label>
                    <input name="username" type="text" placeholder="Tên đăng nhập" class="username" value="<?= $username ?>" style="background-color: <?= $bg_color ?>;">
                    <i class="bi bi-check-circle-fill"></i>
                    <i class="bi bi-exclamation-circle-fill"></i> 
                    <?php
                        // Area = 1
                        if ($area == 1 && $validate[0] == -1) {
                        ?>
                            <p class="text-success"><?= $message ?></p>
                        <?php
                        }
                    ?>
                    <small>Error Message</small>
                </div>
                <div class="field">
                    <label for="">Mật khẩu</label>
                    <input name="password" type="password" placeholder="Mật khẩu" class="password"  value="<?= $password ?>"  style="background-color: <?= $bg_color ?>;">
                    <i class="bi bi-check-circle-fill"></i>
                    <i class="bi bi-exclamation-circle-fill"></i> 
                    <?php
                        // Area = 2
                        if ($area == 2 && $validate[0] == -1) {
                        ?>
                            <p class="text-success"><?= $message ?></p>
                        <?php
                        }
                    ?>
                    <small>Error Message</small>
                </div>
                <small style="color: #e74c3c" class="d-none">Error Message</small>
                <div class="field">
                    <input type="submit" value="Đăng nhập">
                </div>
            </form>
        </div>  
    </div>  
    
</body>

</html>