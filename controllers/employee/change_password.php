<?php
    session_start();
    require_once("../../models/account_operations.php");
    require_once("../../models/setup.php");

    try {
        if (!isset($_GET["option"])) {
            $old_password = isset($_POST["old_password"]) ? $_POST["old_password"] : "";
            $new_password = isset($_POST["new_password"]) ? $_POST["new_password"] : "";
            if (!empty($old_password) && !empty($new_password)) {
                $accountOperations = new AccountOperations;
                $accountManager = $accountOperations->read_one($_SESSION["username"]);
                $account = unserialize($accountManager->getList()[0]);
                if (password_verify($old_password, $account->getPassword())) {
                    $account->setPassword(password_hash($new_password, PASSWORD_BCRYPT));
                    $result = $accountOperations->update($account);
                    $_SESSION["flag"] = $result;
                } else {
                    $_SESSION["flag"] = false;
                }
            } else {
                $_SESSION["flag"] = false;
            }    
        }
        header("location: ../../views/employee/change_password.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
?>