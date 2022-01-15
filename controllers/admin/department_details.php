<?php
    session_start();
    require_once("../../models/department_operations.php");
    require_once("../../models/setup.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    
    try {
        if (!empty($id)) {
            $departmentOperations = new DepartmentOperations;
            $departmentManager = $departmentOperations->read_one($id);
            $_SESSION["department"] = $departmentManager->getList()[0];
            header("location: ../../views/admin/details_department.php");
        } else {
            $_SESSION["flag"] = false;
            header("location: department.php");
        }
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
?>