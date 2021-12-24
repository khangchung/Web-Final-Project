<?php
    // options may be id task or absence
    function upload($tmp_path, $department_name, $employee_name, $option) {
        $path = "../../documents/" . $department_name . "/" . $employee_name . "/" . $option;
        move_uploaded_file($tmp_path, $path);
        return $path;
    }
?>