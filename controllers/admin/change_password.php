<?php
    session_start();
    require_once("../../models/account_operations.php");
    
    $new_password = isset($_POST["new_password"]) ? $_POST["new_password"] : "";
    if (!empty($new_password)) {
        $accountOperations = new AccountOperations;
        $accountManager = $accountOperations->read_one($_SESSION["username"]);
        $account = $accountManager->getList()[0];
        $account->setPassword($new_password);
        $result = $accountOperations->update($account);
        $_SESSION["flag"] = $result;
        header("location: ../../views/change_password.php");
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/change_password.php");
    }
?>