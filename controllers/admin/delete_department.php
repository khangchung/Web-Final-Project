<?php
    session_start();
    require_once("../../models/department_operations.php");

    $name = isset($_SESSION["name"]) ? $_SESSION["name"] : "";
    if (!empty($name)) {
        $departmentOperations = new DepartmentOperations;
        $result = $departmentOperations->delete($name);
        if (!$result) {
            $_SESSION["flag"] = false;
        }
    }

    header("location: department.php");
?>