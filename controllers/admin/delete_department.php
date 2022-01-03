<?php
    session_start();
    require_once("../../models/department_operations.php");
    require_once("../../models/employee_operations.php");

    $name = isset($_GET["name"]) ? $_GET["name"] : "";
    $employees = isset($_SESSION["employees"]) ? $_SESSION["employees"] : "";
    if (!empty($name) && !empty($employees)) {
        foreach ($employees as $employee) {
            $employee = unserialize($employee);
            if ($employee->getDepartment() == $name) {
                $_SESSION["error"] = "constraint";
                break;
            }
        }
        if (!isset($_SESSION["error"])) {
            $departmentOperations = new DepartmentOperations;
            $result = $departmentOperations->delete($name);
            if (!$result) {
                $_SESSION["flag"] = false;
            }
        }
    }

    header("location: department.php");
?>