<?php
    session_start();
    require_once("../../models/department_operations.php");
    
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $desc = isset($_POST["desc"]) ? $_POST["desc"] : "";
    $room = isset($_POST["room"]) ? intval($_POST["room"]) : "";

    if (!empty($name) && !empty($desc) && !empty($room)) {
        $department = new Department($name, $desc, $room);
        $departmentOperations = new DepartmentOperations;
        $result = $departmentOperations->create($department);
        $_SESSION["flag"] = $result;
    } else {
        $_SESSION["flag"] = false;
    }

    header("location: ../../views/admin/add_department.php");
?>