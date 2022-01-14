<?php
    session_start();
    require_once("../models/account_operations.php");
    require_once("../models/setup.php");

    try {
        if (!empty($_SESSION["priority"]) && !empty($_SESSION["username"])) {
            $position = $_SESSION["priority"];
            if ($position == 1) {
                header("location: monitor/index.php");
            } else
            if ($position == 2) {
                header("location: employee/index.php");
            }
        } else {
            $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
            $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
        
            if (empty($username) || empty($password)) {
                $_SESSION["flag"] = false;
                header("location: ../views/login.php");
            }
            
            $AO = new AccountOperations();
            $manager = $AO->read_one($username);
            $account = unserialize($manager->getList()[0]);
            $position = "";
            $duration = 86400 * 30;
        
            if (!is_null($account)) {
                if ($account->getUsername() == $username && password_verify($password, $account->getPassword())) {
                    if ($account->getPriority() == 0) {
                        $_SESSION["username"] = $username;
                        $_SESSION["priority"] = 0;
                        $position = "admin";
                    } else
                    if ($account->getPriority() == 1) {
                        $_SESSION["username"] = $username;
                        $_SESSION["priority"] = 1;
                        $position = "monitor";
                    } else
                    if ($account->getPriority() == 2) {
                        $_SESSION["username"] = $username;
                        $_SESSION["priority"] = 2;
                        $position = "employee";
                    }
                }
            }
        
            if (!empty($position)) {
                setcookie("username", $username, time() + $duration, "/views/login.php");
                setcookie("password", $password, time() + $duration, "/views/login.php");
                if ($username == $password) {
                    header("location: ../views/change_password.php");
                } else {
                    header("location: " . $position . "/index.php");
                }
            } else {
                $_SESSION["flag"] = false;
                header("location: ../views/login.php");
            }
        }
    } catch (Exception $e) {
        writeToErrorLog($e, "Đã xảy ra lỗi không mong muốn");
    }  
?>