<?php
    session_start();
    require_once("../../models/employee_operations.php");
    $employeeOperations = new EmployeeOperations;
    $employeeManager = $employeeOperations->read();
    $_SESSION["employees"] = $employeeManager->getList();
    header("location: ../../views/admin/index.php");
?>