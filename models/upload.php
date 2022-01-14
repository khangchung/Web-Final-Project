<?php
    function uploadAbsense($attachment, $created_date, $department, $employee_id) {
        if (!is_null($attachment["tmp_name"])) {
            $path = "../../documents/" . $department . "/" . $employee_id . "/absense";
            if (!is_dir($path)) {
                mkdir($path, 777, true);
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
            $tmp_path = $path . "/" . $created_date . "." . $extension;
            $i = 1;
            while (1) {
                if (!file_exists($tmp_path)) {
                    if(move_uploaded_file($attachment["tmp_name"], $tmp_path)) {
                        return $tmp_path;
                    } else {
                        return "";
                    }
                }
                $tmp_path = $path . "/" . $created_date . "(" . $i . ")." . $extension;
                $i++;
            }
            return "";
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
            $tmp_path = $path . "/" . $created_date . "." . $extension;
            $i = 1;
            while (1) {
                if (!file_exists($tmp_path)) {
                    if(move_uploaded_file($attachment["tmp_name"], $tmp_path)) {
                        return $tmp_path;
                    } else {
                        return "";
                    }
                }
                $tmp_path = $path . "/" . $created_date . "(" . $i . ")." . $extension;
                $i++;
            }
            return ""; 
        } else {
            return "";
        }
    }

    function uploadAvatar($attachment, $department, $employee_id) {
        $path = "../../documents/" . $department . "/" . $employee_id;
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