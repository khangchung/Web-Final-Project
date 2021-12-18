<?php
    session_start();
    require_once("../../models/department_operations.php");
    require_once("../../models/department.php");

    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $desc = isset($_POST["desc"]) ? $_POST["desc"] : "";
    $room = isset($_POST["room"]) ? $_POST["room"] : "";

    if (!empty($name) && !empty($desc) && !empty($room)) {
        $department = new Department($name, $desc, $room);
        $departmentOperations = new DepartmentOperations;
        $result = $departmentOperations->update($department);
        $_SESSION["flag"] = $result;
    } else {
        $_SESSION["flag"] = false;
    }

    header("location: ../../views/admin/edit_department.php");
?>