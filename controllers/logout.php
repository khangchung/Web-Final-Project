<?php
    session_start();
    session_destroy();
    require_once("../models/setup.php");
    try {
        header("location: ../views/login.php");
    } catch (Exception $e) {
        writeToErrorLog($e, "Đã xảy ra lỗi không mong muốn");
    }
?>