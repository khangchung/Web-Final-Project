<?php
    // options may be id task or absence
    function upload($attachment, $created_date, $department, $username, $option) {
        if (!is_null($tmp_path)) {
            $path = "../../documents/" . $department . "/" . $username . "/" . $option;
            if (!is_dir($path)) {
                mkdir($path);
            }
            if(move_uploaded_file($attachment["tmp_path"], $path)) {
                $basename = $attachment["name"];
                $extension = pathinfo($basename, PATHINFO_EXTENSION);
                rename($path . "/" . $basename, $path . "/" . $created_date . "." . $extension);
                return $path . "/" . $created_date . "." . $extension;
            } else {
                return "";
            }    
        } else {
            return "";
        }
    }

    function uploadAvatar($tmp_path, $department_name, $employee_name) {
        $path = "../../documents/" . $department_name . "/" . $employee_name;
        if (!file_exists($path)) {
            mkdir($path);
        }
        move_uploaded_file($tmp_path, $path);
        return $path;
    }
?>