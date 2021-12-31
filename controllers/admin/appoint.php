<?php
    session_start();
    require_once("../../models/employee_operations.php");
    
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $department = isset($_POST["department"]) ? $_POST["department"] : "";
    $employees = isset($_SESSION["employees"]) ? $_SESSION["employees"] : "";

    if (!empty($username) && !empty($employees)) {
        $employeeOperations = new EmployeeOperations;
        foreach ($employees as $employee) {
            $employee = unserialize($employee);
            if ($employee->getUsername() == $username && $employee->getDepartment() == $department
                && $employee->Position() != 1) {
                foreach ($employees as $employee2) {
                    $employee2 = unserialize($employee2);
                    if ($employee2->getPosition() == 1 && $employee2->getDepartment() == $department) {
                        $employee2->setPosition(0);
                        if ($employeeOperations->update($employee2)) {
                            $employee->setPosition(1);
                            $_SESSION["flag"] = $employeeOperations->update($employee);
                            break;
                        }
                    }
                }
                break;
            } else {
                $_SESSION["flag"] = false;
            }
        }
    }

    header("location: ../../views/admin/details_department.php");
?>