<?php
    function getConnection() {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "company_management";
        $conn = new mysqli($hostname, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connect fail: " . $conn->connect_error);
        }
        return $conn;
    }
?>