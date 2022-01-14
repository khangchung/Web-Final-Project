<?php
    session_start();
    require_once("../../models/absence_operations.php");
    require_once("../../models/department_operations.php");
    require_once("../../models/setup.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : "";

    try {
        if (!empty($id)) {
            $departmentOperations = new DepartmentOperations;
            $departments = $departmentOperations->read()->getList();
            $_SESSION["departments"] = $departments;
            $absenceOperations = new AbsenceOperations;
            $absence = $absenceOperations->read_one($id)->getList()[0];
            $_SESSION["absence"] = $absence;
            header("location: ../../views/monitor/details_offday.php");
        } else {
            $_SESSION["flag"] = false;
            header("location: ../../views/monitor/offday_manager.php");
        }
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");
    }
?>