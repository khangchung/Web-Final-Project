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
<body style="background-image: linear-gradient(to bottom right, #1b6572, #b9efff);">
    <div class="container-fluid changePass">
        <div class="wrapper">
            <div class="title">
                <p>Đổi mật khẩu</p>
            </div>
            <form action="../controllers/change_password.php" method="POST" class="login">
                <div class="field">
                    <label for="">Mật khẩu mới</label>
                    <input name="new_password" type="password" placeholder="">
                </div>
                <div class="field">
                    <label for="">Xác nhận mật khẩu</label>
                    <input type="password" placeholder="">
                </div>
                <div class="field btn_changePass">
                    <input type="submit" value="Xác nhận">
                </div>
            </form>
        </div>
    </div>
</body>
</html>