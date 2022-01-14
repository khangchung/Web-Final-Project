<?php
    session_start();
    require_once("../models/setup.php");
    try {
        if (isset($_SESSION["username"]) && isset($_SESSION["priority"])) {
            if ($_SESSION["priority"] == 0) {
                header("location: admin/index.php");
            } else
            if ($_SESSION["priority"] == 1) {
                header("location: monitor/index.php");
            } else
            if ($_SESSION["priority"] == 2) {
                header("location: employee/index.php");
            }
        } else {
            header("location: ../views/login.php");
        }
    } catch (Exception $e) {
        writeToErrorLog($e, "Đã xảy ra lỗi không mong muốn");
    }
?>