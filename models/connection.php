<?php
    require_once("setup.php");

    function getConnection() {
        $hostname = isset($_COOKIE["db_hostname"]) ? $_COOKIE["db_hostname"] : "";
        $username = isset($_COOKIE["db_username"]) ? $_COOKIE["db_username"] : "";
        $password = isset($_COOKIE["db_password"]) ? $_COOKIE["db_password"] : "";
        $database = isset($_COOKIE["db_database"]) ? $_COOKIE["db_database"] : "";
        $conn = null;
        try {
            if (!empty($hostname) && !empty($username) && !empty($database)) {
                if (empty($password)) $conn = new mysqli($hostname, $username, "", $database);
                else $conn = new mysqli($hostname, $username, $password, $database);
                if ($conn->connect_error) {
                    writeToErrorLog("Connect fail: " . $conn->connect_error, "Xảy ra lỗi trong khi kết nối đến cơ sở dữ liệu");
                }
            }
        } catch (Exception $e) {
            writeToErrorLog("Connect fail: " . $e, "Xảy ra lỗi trong khi kết nối đến cơ sở dữ liệu");
        }
        return $conn;
    }
?>