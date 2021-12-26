<?php
    session_start();
    $_SESSION["flag"] = false;
    require_once("../models/account_operations.php");

    $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";

    if (empty($username) || empty($password)) {
        header("location: ../views/login.php");
    }
    
    $AO = new AccountOperations();
    $manager = $AO->read_one($username);
    $account = $manager->getList()[0];
    $position = "";

    if ($account->getUsername() == $username && password_verify($password, $account->getPassword())) {
        if ($account->getPriority() == 0) {
            $_SESSION["username"] = $username;
            $_SESSION["priority"] = $priority;
            $position = "admin";
        } else
        if ($account->getPriority() == 1) {
            $_SESSION["username"] = $username;
            $_SESSION["priority"] = $priority;
            $position = "monitor";
        } else
        if ($account->getPriority() == 2) {
            $_SESSION["username"] = $username;
            $_SESSION["priority"] = $priority;
            $position = "employee";
        }
    }

    if (!empty($position)) {
        header("location: " . $position . "/index.php");
    } else {
        header("location: ../../views/login.php");
    }
?>