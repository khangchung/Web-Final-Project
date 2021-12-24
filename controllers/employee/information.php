<?php
    session_start();
    require_once("../../models/employee_operations.php");
    $employeeOperations = new EmployeeOperations;
    $employeeManager = $employeeManager->read();
    $employeeList = $employeeManager->getList();
    foreach ($employeeList as $employee) {
        if ($employee->getUsername() == $_SESSION["username"]) {
            $_SESSION["information"] = $employee;
            break;
        }
    }
    header("location: ../../views/employee/information.php");
?>