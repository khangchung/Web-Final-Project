<?php
    session_start();
    require_once("../../models/account_operations.php");

    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $priority = isset($_POST["priority"]) ? $_POST["priority"] : "";
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