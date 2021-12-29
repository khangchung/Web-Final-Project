<?php
    session_start();
    require_once("../../models/department_operations.php");

    $id = isset($_GET["name"]) ? $_GET["name"] : "";
    if (!empty($id)) {
        $departmentOperations = new DepartmentOperations;
        $departmentManager = $departmentOperations->read_one($id);
        $_SESSION["department"] = $departmentManager->getList()[0];
        header("location: ../../views/admin/details_department.php");
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/admin/index.php");
    }
?>