<?php
    session_start();
    require_once("../models/account_operations.php");
    require_once("../models/setup.php");
    
    $new_password = isset($_POST["new_password"]) ? password_hash($_POST["new_password"], PASSWORD_BCRYPT) : "";

    try {
        if (!empty($new_password)) {
            $accountOperations = new AccountOperations;
            $accountManager = $accountOperations->read_one($_SESSION["username"]);
            $account = $accountManager->getList()[0];
            $account->setPassword($new_password);
            $result = $accountOperations->update($account);
            $_SESSION["flag"] = $result;
        } else {
            $_SESSION["flag"] = false;
        }
    
        if (!empty($_SESSION["flag"]) && $_SESSION["flag"] && isset($_SESSION["priority"])) {
            if ($_SESSION["priority"] == 0) {
                header("location: admin/index.php");
            } else
            if ($_SESSION["priority"] == 1) {
                header("location: monitor/index.php");
            } else
            if ($_SESSION["priority"] == 2) {
                header("location: employee/index.php");
            } else {
                header("location: login.php");
            }
        } else {
            header("location: ../views/change_password.php");
        }
    } catch (Exception $e) {
        writeToErrorLog($e, "Đã xảy ra lỗi không mong muốn");
    }
?>