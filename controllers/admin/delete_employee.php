<?php
    session_start();
    require_once("../../models/employee_operations.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if (!empty($id)) {
        $employeeOperations = new EmployeeOperations;
        $result = $employeeOperations->delete($id);
        if (!$result) {
            $_SESSION["flag"] = false;
        }
    }

    header("location: index.php");
?>