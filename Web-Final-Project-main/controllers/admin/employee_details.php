<?php
    session_start();
    require_once("../../models/employee_operations.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if (!empty($id)) {
        $employeeOperations = new EmployeeOperations;
        $employeeManager = $employeeOperations->read_one($id);
        $_SESSION["employee"] = $employeeManager->getList()[0];
        header("location: ../../views/admin/details_employee.php");
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/admin/index.php");
    }
?>