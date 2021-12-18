<?php
    session_start();
    require_once("../../models/employee_operations.php");
    require_once("../../models/employee.php");

    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $position = isset($_POST["position"]) ? $_POST["position"] : "";
    $department = isset($_POST["department"]) ? $_POST["department"] : "";
    $avatar = isset($_POST["avatar"]) ? $_POST["avatar"] : "";
    $day_off = isset($_POST["day_off"]) ? $_POST["day_off"] : "";

    if (!empty($id) && !empty($username) && !empty($fullname) && !empty($gender) && !empty($position) 
    && !empty($department) && !empty($avatar) && !empty($day_off)) {
        $employee = new Employee($id, $username, $fullname, $gender, $position, $department, $avatar, 
        $day_off);
        $employeeOperations = new EmployeeOperations;
        $result = $employeeOperations->create($employee);
        $_SESSION["flag"] = $result;
    } else {
        $_SESSION["flag"] = false;
    }

    header("location: ../../views/admin/add_employee.php");
?>