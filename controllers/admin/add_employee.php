<?php
    session_start();
    require_once("../../models/employee_operations.php");
    require_once("../../models/account_operations.php");
    require_once("../../models/setup.php");

    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
    $department = isset($_POST["department"]) ? $_POST["department"] : "";

    try {
        if (!empty($username) && !empty($fullname) && !empty($department)) {
            $accountOperations = new AccountOperations;
            $password = password_hash($username, PASSWORD_BCRYPT);
            $account_result = $accountOperations->create(new Account($username, $password, 2));
            $id = getNextEmployeeID($department);
            $avatar = createEmployeeFolder($department, $id);
            $day_off = 12;
            if ($account_result && $avatar != "") {
                $employee = new Employee($id, $username, $fullname, 2, $department, $avatar, 
                $day_off);
                $employeeOperations = new EmployeeOperations;
                $result = $employeeOperations->create($employee);
                $_SESSION["flag"] = $result;
                if ($result) {
                    $_SESSION["message"] = "Thêm thành công";
                } else {
                    $_SESSION["message"] = "Thêm thất bại";
                }
            } else {
                $_SESSION["flag"] = $account_result;
                $_SESSION["message"] = "Xảy ra lỗi không mong muốn trong quá trình xử lý";
            }
        } else {
            $_SESSION["flag"] = false;
            $_SESSION["message"] = "Thông tin không hợp lệ";
        }
        header("location: ../../views/admin/add_employee.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
?>