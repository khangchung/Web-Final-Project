<?php
    require_once("models/setup.php");

    try {
        if (isset($_COOKIE["db_hostname"]) && isset($_COOKIE["db_username"]) && isset($_COOKIE["db_database"])) {
            setcookie("db_hostname", "", time() - 3600, "/");
            setcookie("db_username", "", time() - 3600, "/");
            setcookie("db_database", "", time() - 3600, "/");
            if (isset($_COOKIE["db_password"])) {
                setcookie("db_password", "", time() - 3600, "/");
            }
        }
        header("location: index.php");
    } catch (Exception $e) {
        writeToErrorLog($e, "Đã xảy ra lỗi khong mong muốn");
    }
?>