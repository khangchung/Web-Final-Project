<?php
    session_start();
    require_once("../../models/account_operations.php");
    require_once("../../models/account.php");

    $username = isset($_GET["username"]) ? $_GET["username"] : "";
    $priority = isset($_GET["priority"]) ? $_GET["priority"] : "";
    if (!empty($id) && !empty($priority)) {
        $accountOperations = new AccountOperations;
        $password = password_hash($username, PASSWORD_DEFAULT);
        $account = new Account($username, $password, $priority);
        $result = $accountOperations->update($account);
        $_SESSION["flag"] = $result;
    } else {
        $_SESSION["flag"] = false;
    }

    header("location: ../../views/admin/details_employee.php");
?>