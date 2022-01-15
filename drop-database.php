<?php
    require_once("models/setup.php");

    $key="mvm";
    
    if (isset($_GET["key"]) && $_GET["key"] == $key) {
        $db_hostname = isset($_COOKIE["db_hostname"]) ? $_COOKIE["db_hostname"] : "";
        $db_username = isset($_COOKIE["db_username"]) ? $_COOKIE["db_username"] : "";
        $db_password = isset($_COOKIE["db_password"]) ? $_COOKIE["db_password"] : "";
        $db_database = isset($_COOKIE["db_database"]) ? $_COOKIE["db_database"] : "";
        if (!empty($db_hostname) && !empty($db_username) & !empty($db_database)) {
            $conn = new mysqli($db_hostname, $db_username, $db_password);
            if ($conn->connect_error) {
                writeToErrorLog("Connection failed: " . $conn->connect_error, "Đã xảy ra lỗi không mong muốn");
            }
            $sql = "drop database if exists " . $db_database . ";";
            if (!$conn->query($sql)) {
                writeToErrorLog("Can not create database: " . $conn->error, "Đã xảy ra lỗi không mong muốn");
            }
            header("location: index.php");
        }
    }
?>