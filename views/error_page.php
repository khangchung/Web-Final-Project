<?php
    $error_message = isset($_SESSION["page_message_error"]) ? $_SESSION["page_message_error"] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang lỗi</title>
</head>
<body>
    <div class="container">
        <h1>Lỗi!!!</h1>
        <p><?= $error_message ?></p>
        <p>Ấn vào <a href="../index.php">đây</a> để trở về trang chủ.</p>
    </div>
</body>
</html>