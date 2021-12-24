<?php
    session_start();
    require_once("../../models/employee_operations.php");
    require_once("../../models/task_operations.php");
    
    $employeeOperations = new EmployeeOperations;
    $employeeManager = $employeeManager->read();
    $employeeList = $employeeManager->getList();
    foreach ($employeeList as $employee) {
        if ($employee->getUsername() == $_SESSION["username"]) {
            $_SESSION["information"] = $employee;
            break;
        }
    }
    $taskOperations = new TaskOperations;
    $taskManager =  $taskOperations->read();
    $_SESSION["task"] = $taskManager->getList();
    header("location: ../../views/employee/index.php");
?>