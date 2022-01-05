<?php
    function uploadAbsense($attachment, $created_date, $department, $employee_id) {
        if (!is_null($attachment["tmp_name"])) {
            $path = "../../documents/" . $department . "/" . $employee_id . "/absense";
            if (!is_dir($path, 777, true)) {
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

    function uploadTask($attachment, $created_date, $task_id, $department, $employee_id) {
        if (!is_null($attachment["tmp_name"])) {
            $path = "../../documents/" . $department . "/" . $employee_id . "/task" . "/" . $task_id;
            if (!is_dir($path)) {
                mkdir($path, 777, true);
            }
            $basename = $attachment["name"];
            $extension = pathinfo($basename, PATHINFO_EXTENSION);
            $path .= "/" . $created_date . "-task." . $extension;
            if(move_uploaded_file($attachment["tmp_name"], $path)) {
                return $path;
            } else {
                return "";
            }    
        } else {
            return "";
        }
    }

    function uploadTaskLog($attachment, $created_date, $task_id, $department, $employee_id) {
        if (!is_null($attachment["tmp_name"])) {
            $path = "../../documents/" . $department . "/" . $employee_id . "/task" . "/" . $task_id;
            if (!is_dir($path)) {
                mkdir($path, 777, true);
            }
            $basename = $attachment["name"];
            $extension = pathinfo($basename, PATHINFO_EXTENSION);
            $path .= "/" . $created_date . "-tasklog." . $extension;
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
        if (!is_dir($path)) {
            mkdir($path, 777, true);
        }
        $path .= "/avatar.jpg";
        if (move_uploaded_file($attachment["tmp_name"], $path)) {
            return $path;
        } else {
            return "";
        }
    }
?>