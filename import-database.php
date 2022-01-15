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
            $sql = "create database if not exists " . $db_database . ";";
            if (!$conn->query($sql)) {
                writeToErrorLog("Can not create database: " . $conn->error, "Đã xảy ra lỗi không mong muốn");
            }
            $conn->select_db($db_database);
            $filename = $db_database . ".sql";
            executeQueryFrom($conn, $filename);
            header("location: index.php");
        }
    }

    function executeQueryFrom($conn, $filename) {
        try {
            $sql_file = fopen($filename, "r");
            $dict = array("--", "", "/*");
            $script = "";
            while (!feof($sql_file)) {
                $line = fgets($sql_file);
                if (!in_array(substr($line, 0, 2), $dict)) {
                    $script .= $line;
                    if (substr(trim($line), -1, 1) == ";") {
                        if (!$conn->query($script)) {
                            writeToErrorLog("Execute query failed: " . $conn->error);
                        }
                        $script = "";
                    }
                }
            }
        } catch (Exception $e) {
            writeToErrorLog($e, "Đã xảy ra lỗi không mong muốn");
        }
    }
?>