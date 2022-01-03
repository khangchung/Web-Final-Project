<?php
    session_start();
    require_once("../../models/employee_operations.php");
    require_once("../../models/department_operations.php");
    $employeeOperations = new EmployeeOperations;
    $employeeManager = $employeeOperations->read();
    $_SESSION["employees"] = $employeeManager->getList();
    $departmentOperations = new DepartmentOperations;
    $departmentManager = $departmentOperations->read();
    $_SESSION["departments"] = $departmentManager->getList();
    header("location: ../../views/admin/index.php");
?>