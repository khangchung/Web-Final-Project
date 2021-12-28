<?php
    // options may be id task or absence
    function upload($tmp_path, $department_name, $employee_name, $option) {
        $path = "../../documents/" . $department_name . "/" . $employee_name . "/" . $option;
        if (!file_exists($path)) {
            mkdir($path);
        }
        move_uploaded_file($tmp_path, $path);
        return $path;
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