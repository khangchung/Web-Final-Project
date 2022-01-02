<?php
    session_start();
    require_once("../models/account_operations.php");
    
    $new_password = isset($_POST["new_password"]) ? password_hash($_POST["new_password"], PASSWORD_BCRYPT) : "";

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

    if (!empty($_SESSION["flag"]) && $_SESSION["flag"]) {
        header("location: login.php");
    } else {
        header("location: ../views/change_password.php");
    }
?>