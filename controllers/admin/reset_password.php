<?php
    session_start();
    require_once("../../models/account_operations.php");
    require_once("../../models/setup.php");

    $username = isset($_GET["username"]) ? $_GET["username"] : "";
    
    try {
        if (!empty($username)) {
            $accountOperations = new AccountOperations;
            $account = unserialize($accountOperations->read_one($username)->getList()[0]);
            $password = password_hash($username, PASSWORD_BCRYPT);
            $account->setPassword($password);
            $result = $accountOperations->update($account);
            $_SESSION["flag"] = $result;
            if ($result) {
                $_SESSION["message"] = "Reset thành công";
            } else {
                $_SESSION["message"] = "Reset thất bại";
            }
        } else {
            $_SESSION["flag"] = false;
            $_SESSION["message"] = "Thông tin không hợp lệ";
        }    
        header("location: ../../views/admin/details_employee.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
?>