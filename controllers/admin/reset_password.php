<?php
    session_start();
    require_once("../../models/account_operations.php");
    require_once("../../models/setup.php");

    $username = isset($_GET["username"]) ? $_GET["username"] : "";
    
    try {
        if (!empty($username)) {
            $accountOperations = new AccountOperations;
            $account = $accountOperations->read_one($username)->getList()[0];
            $password = password_hash($username, PASSWORD_BCRYPT);
            $account->setPassword($password);
            $result = $accountOperations->update($account);
            $_SESSION["flag"] = $result;
        } else {
            $_SESSION["flag"] = false;
        }    
        header("location: ../../views/admin/details_employee.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
?>