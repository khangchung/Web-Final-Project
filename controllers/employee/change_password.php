<?php
    session_start();
    require_once("../../models/account_operations.php");
    require_once("../../models/account.php");
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    if (!empty($username) && !empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $account = new Account($username, $password, 2);
        $accountOperations = new AccountOperations;
        $result = $accountOperations->update($account);
        $_SESSION["flag"] = $result;
        header("location: ../../views/employee/change_password.php");
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/employee/change_password.php");
    }
?>