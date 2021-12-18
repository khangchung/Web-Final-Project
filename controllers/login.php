<?php
    require_once("../models/account_operations.php");

    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    if (empty($username) || empty($password)) {
        header("location: ../views/login.php");
    }
    
    $AO = new AccountOperations();
    $manager = $AO->read_one($username);
    
    foreach ($manager->getList() as $account) {
        if ($account->getUsername() == $username && $account->getPassword() == $password) {
        // if ($account->getUsername() == $username && password_verify($password, $account->getPassword())) {
            if ($account->getPriority() == 0) {
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["priority"] = $priority;
                header("location: admin/index.php");
            } else
            if ($account->getPriority() == 1) {
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["priority"] = $priority;
                header("location: monitor/index.php");
            } else
            if ($account->getPriority() == 2) {
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["priority"] = $priority;
                header("location: employee/index.php");
            }
        }
    }
?>