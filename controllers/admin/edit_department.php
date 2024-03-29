<?php
    session_start();
    require_once("../../models/department_operations.php");
    require_once("../../models/setup.php");

    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $desc = isset($_POST["desc"]) ? $_POST["desc"] : "";
    $room = isset($_POST["room"]) ? intval($_POST["room"]) : "";

    try {
        if (!empty($id) && !empty($name) && !empty($desc) && !empty($room)) {
            $departmentOperations = new DepartmentOperations;
            $department = unserialize($departmentOperations->read_one($id)->getList()[0]);
            $department->setName($name);
            $department->setDescription($desc);
            $department->setRoom($room);
            $result = $departmentOperations->update($department);
            $_SESSION["flag"] = $result;
            if ($result) {
                $_SESSION["message"] = "Cập nhật thành công";
            } else {
                $_SESSION["message"] = "Cập nhật thất bại";
            }
        } else {
            $_SESSION["flag"] = false;
            $_SESSION["message"] = "Thông tin không hợp lệ";
        }
        header("location: department.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
?>