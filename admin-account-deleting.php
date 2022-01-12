<?php
    require_once("models/account_operations.php");
    require_once("models/account.php");

    $username = isset($_GET["username"]) ? $_GET["username"] : "";
    $key = isset($_GET["key"]) ? $_GET["key"] : "";
    $teacher_name = "MaiVanManh";

    if (!empty($username) && !empty($key)) {
        if ($key == $teacher_name) {
            $accountOperations = new AccountOperations;
            if ($accountOperations->delete($username)){
                ?>
                <p style="font-size: 24px; text-align: center; margin-top: 250px;">Tài khoản <span style="font-weight: bold;"><?= $username ?></span> đã được xóa thành công!</p>
            <?php
            } else {
            ?>
                <p style="font-size: 24px; text-align: center; margin-top: 250px;">Tài khoản <span style="font-weight: bold;"><?= $username ?></span> hiện chưa được xóa thành công. Vui lòng thử lại sau!</p>
            <?php
            }
        }
    }
    ?>
        <p style="font-size: 24px; text-align: center;">Ấn vào <a href="index.php" style="font-weight: bold;">đây</a> để trở về trang đăng nhập.</p>
    <?php
?>