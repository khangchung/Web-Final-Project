<?php
    session_start();
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap" rel="stylesheet">
    
    <!--Css-->
    <link rel="stylesheet" href="style.css">
    
    <!--Javascript-->
    <script src="main.js"></script>
    <title>Đổi mật khẩu</title>
</head>
<body style="background: linear-gradient(to right, #485563, #29323c);">
    <div class="container-fluid changePass">
        <div class="wrapper" id="changePassword">
            <div class="title1">
                <p>Đổi mật khẩu</p>
            </div>
            <form action="../controllers/change_password.php" onsubmit="return checkChangePassword();" id="login_form" method="POST" class="login">
                <div class="field">
                    <label for="">Mật khẩu mới</label>
                    <input name="new_password" id="newPass1" type="password" placeholder="">
                    <i class="bi bi-check-circle-fill"></i>
                    <i class="bi bi-exclamation-circle-fill"></i> 
                    <small>Error Message</small>
                </div>
                <div class="field">
                    <label for="">Xác nhận mật khẩu</label>
                    <input type="password" id="newPass2" placeholder="">
                    <i class="bi bi-check-circle-fill"></i>
                    <i class="bi bi-exclamation-circle-fill"></i> 
                    <small>Error Message</small>
                </div>
                <small style="color: #e74c3c" class="d-none">Error Message</small>
                <div class="field btn_changePass">
                    <input type="submit" value="Xác nhận">
                </div>
            </form>
        </div>
    </div>
</body>
</html>