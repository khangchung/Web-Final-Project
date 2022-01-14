<?php
    session_start();
    require_once("../../models/department_operations.php");
    require_once("../../models/setup.php");
    try {
        $departmentOperations = new DepartmentOperations;
        $departmentManager = $departmentOperations->read();
        $_SESSION["departments"] = $departmentManager->getList();
        header("location: ../../views/admin/department_manager.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
?>