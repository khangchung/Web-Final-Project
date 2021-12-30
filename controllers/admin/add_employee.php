<?php
    session_start();
    require_once("../../models/employee_operations.php");
    require_once("../../models/account_operations.php");
    require_once("../../models/setup.php");

    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
    $position = isset($_POST["position"]) ? intval($_POST["position"]) : "";
    $department = isset($_POST["department"]) ? $_POST["department"] : "";

    if (!empty($username) && !empty($fullname) && !empty($position) && !empty($department)) {
        $accountOperations = new AccountOperations;
        $account_result = $accountOperations->create(new Account($username, $username, $position));
        $id = getNextID($department);
        $avatar = createEmployeeFolder($department, $fullname);
        $day_off = $position == 1 ? 15 : 12;
        if ($account_result && $avatar != "") {
            $employee = new Employee($id, $username, $fullname, $position, $department, $avatar, 
            $day_off);
            $employeeOperations = new EmployeeOperations;
            $result = $employeeOperations->create($employee);
            $_SESSION["flag"] = $result;
        } else {
            $_SESSION["flag"] = $account_result;
        }
    } else {
        $_SESSION["flag"] = false;
    }

    header("location: ../../views/admin/add_employee.php");
?>