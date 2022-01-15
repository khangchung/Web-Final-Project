<?php
    session_start();
    require_once("../../models/absence_operations.php");
    require_once("../../models/department_operations.php");
    require_once("../../models/setup.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : "";

    try {
        if (!empty($id)) {
            $departmentOperations = new DepartmentOperations;
            $departmentManager = $departmentOperations->read();
            $_SESSION["departments"] = $departmentManager->getList();
            $absenceOperations = new AbsenceOperations;
            $absence = $absenceOperations->read_one($id)->getList()[0];
            $_SESSION["absence"] = $absence;
            header("location: ../../views/employee/details_history_offday.php");
        } else {
            $_SESSION["flag"] = false;
            $_SESSION["message"] = "Thông tin không hợp lệ";
            header("location: ../../views/employee/offday_manager.php");
        }
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
?>