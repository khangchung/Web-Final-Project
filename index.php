<?php
    if (!isset($_COOKIE["hostname"]) && !isset($_COOKIE["username"]) && !isset($_COOKIE["password"]) && !isset($_COOKIE["database"])) {
        $db_info = array();
        $setting_file = fopen("database_setting.txt", "r");
        while (!feof($setting_file)) {
            $str = fgets($setting_file);
            $tmp = explode("=", $str);
            $db_info[$tmp[0]] = explode("\r\n", $tmp[1])[0];
        }
        fclose($setting_file);
        $duration = 86400 * 30;
        setcookie("db_hostname", $db_info["hostname"], time() + $duration, "/");
        setcookie("db_username", $db_info["username"], time() + $duration, "/");
        setcookie("db_password", $db_info["password"], time() + $duration, "/");
        setcookie("db_database", $db_info["database"], time() + $duration, "/");
    }
    header("location: controllers/index.php");
?>