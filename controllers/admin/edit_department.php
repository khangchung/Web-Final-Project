<?php
    session_start();
    require_once("../../models/department_operations.php");

    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $desc = isset($_POST["desc"]) ? $_POST["desc"] : "";
    $room = isset($_POST["room"]) ? intval($_POST["room"]) : "";

    if (!empty($id) && !empty($name) && !empty($desc) && !empty($room)) {
        $departmentOperations = new DepartmentOperations;
        $department = unserialize($departmentOperations->read_one($id)->getList()[0]);
        $department->setName($name);
        $department->setDescription($desc);
        $department->setRoom($room);
        $result = $departmentOperations->update($department);
        $_SESSION["flag"] = $result;
    } else {
        $_SESSION["flag"] = false;
    }

    header("location: department.php");
?>