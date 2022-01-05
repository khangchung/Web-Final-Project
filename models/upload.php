<?php
    // options may be id task or absence
    function uploadAbsense($attachment, $created_date, $department, $username) {
        if (!is_null($attachment["tmp_name"])) {
            $path = "../../documents/" . $department . "/" . $username . "/absense";
            if (!is_dir($path)) {
                mkdir($path);
            }
            $basename = $attachment["name"];
            $extension = pathinfo($basename, PATHINFO_EXTENSION);
            $path .= "/" . $created_date . "." . $extension;
            if(move_uploaded_file($attachment["tmp_name"], $path)) {
                return $path;
            } else {
                return "";
            }    
        } else {
            return "";
        }
    }

    function uploadAvatar($attachment, $department, $username) {
        $path = "../../documents/" . $department . "/" . $username;
        if (!file_exists($path)) {
            mkdir($path);
        }
        $path .= "/avatar.jpg";
        if (move_uploaded_file($attachment["tmp_name"], $path)) {
            return $path;
        } else {
            return "";
        }
    }
?>