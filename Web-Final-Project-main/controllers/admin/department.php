<?php
    session_start();
    require_once("../../models/department_operations.php");
    $departmentOperations = new DepartmentOperations;
    $departmentManager = $departmentOperations->read();
    $_SESSION["departments"] = $departmentManager->getList();
    header("location: ../../views/admin/department_manager.php");
?>