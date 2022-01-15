<?php
    error_reporting(0);
    require_once("models/account_operations.php");
    require_once("models/account.php");
    require_once("models/setup.php");

    $username = isset($_GET["username"]) ? $_GET["username"] : "";
    $key = isset($_GET["key"]) ? $_GET["key"] : "";
    $teacher_name = "mvm";

    try {
        if (!empty($username) && !empty($key)) {
            try {
                if ($key == $teacher_name) {
                    $accountOperations = new AccountOperations;
                    $password = password_hash($username, PASSWORD_BCRYPT);
                    $account = new Account($username, $password, 0);
                    if ($accountOperations->create($account)){
                    ?>
                        <p style="font-size: 24px; text-align: center; margin-top: 250px;">Tài khoản <span style="font-weight: bold;"><?= $username ?></span> đã được tạo thành công!</p>
                    <?php
                    } else {
                    ?>
                        <p style="font-size: 24px; text-align: center; margin-top: 250px;">Tài khoản <span style="font-weight: bold;"><?= $username ?></span> hiện chưa được tạo thành công. Vui lòng thử lại sau!</p>
                    <?php
                    }
                }
            } catch (Exception $e) {
                ?>
                    <p style="font-size: 24px; text-align: center; margin-top: 250px;">Tài khoản <span style="font-weight: bold;"><?= $username ?></span> hiện chưa được tạo thành công. Vui lòng thử lại sau!</p>
                <?php
            }
        }
        ?>
            <p style="font-size: 24px; text-align: center;">Ấn vào <a href="index.php" style="font-weight: bold;">đây</a> để trở về trang đăng nhập.</p>
        <?php
    } catch (Exception $e) {
        writeToErrorLog($e, "Đã xảy ra lỗi không mong muốn");
    }
?>