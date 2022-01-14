<?php
    session_start();
    $error_message = isset($_SESSION["page_error_message"]) ? $_SESSION["page_error_message"] : "";
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
        <p>Ấn vào <a href="../index.php">đây</a> để quay trở về.</p>
    </div>
</body>
</html>