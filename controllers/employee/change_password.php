<?php
    session_start();
    require_once("../../models/account_operations.php");
    
    $old_password = isset($_POST["old_password"]) ? $_POST["old_password"] : "";
    $new_password = isset($_POST["new_password"]) ? $_POST["new_password"] : "";
    if (!empty($old_password) && !empty($new_password)) {
        $accountOperations = new AccountOperations;
        $accountManager = $accountOperations->read_one($_SESSION["username"]);
        $account = $accountManager->getList()[0];
        if ($account->getPassword() == $old_password) {
            $password = password_hash($new_password, PASSWORD_DEFAULT);
            $account->setPassword($password);
            $result = $accountOperations->update($account);
            $_SESSION["flag"] = $result;    
        } else {
            $_SESSION["flag"] = false;
        }
        header("location: ../../views/employee/change_password.php");
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/employee/change_password.php");
    }
?>