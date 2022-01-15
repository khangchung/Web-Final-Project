<?php
    session_start();
    require_once("../../models/department_operations.php");
    require_once("../../models/setup.php");

    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $desc = isset($_POST["desc"]) ? $_POST["desc"] : "";
    $room = isset($_POST["room"]) ? intval($_POST["room"]) : "";

    try {
        if (!empty($name) && !empty($desc) && !empty($room)) {
            $department = new Department(getNextDepartmentID() ,$name, $desc, $room);
            $departmentOperations = new DepartmentOperations;
            $result = $departmentOperations->create($department);
            $_SESSION["flag"] = $result;
            if ($result) {
                $_SESSION["message"] = "Thêm thành công";
            } else {
                $_SESSION["message"] = "Thêm thất bại";
            }
        } else {
            $_SESSION["flag"] = false;
            $_SESSION["message"] = "Thông tin không hợp lệ";
        }
        header("location: ../../views/admin/add_department.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
?>