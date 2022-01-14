<?php
    session_start();
    require_once("../../models/employee_operations.php");
    require_once("../../models/setup.php");

    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
    $position = isset($_POST["position"]) ? $_POST["position"] : "";
    $department = isset($_POST["department"]) ? $_POST["department"] : "";
    $avatar = isset($_POST["avatar"]) ? $_POST["avatar"] : "";
    $day_off = isset($_POST["day_off"]) ? $_POST["day_off"] : "";

    try {
        if (!empty($id) && !empty($username) && !empty($fullname) && !empty($position) 
        && !empty($department) && !empty($avatar) && !empty($day_off)) {
            $employee = new Employee($id, $username, $fullname, $gender, $position, $department, $avatar, 
            $day_off);
            $employeeOperations = new EmployeeOperations;
            $result = $employeeOperations->update($employee);
            $_SESSION["flag"] = $result;
        } else {
            $_SESSION["flag"] = false;
        }
        header("location: ../../views/admin/edit_employee.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
?>