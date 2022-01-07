<?php
    session_start();
    require_once("../../models/absence_operations.php");
    require_once("../../models/department_operations.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if (!empty($id)) {
        $departmentOperations = new DepartmentOperations;
        $departmentManager = $departmentOperations->read();
        $_SESSION["departments"] = $departmentManager->getList();
        $absenceOperations = new AbsenceOperations;
        $absence = unserialize($absenceOperations->read_one($id)->getList()[0]);
        $_SESSION["absence"] = serialize($absence);
        header("location: ../../views/monitor/details_history_offday.php");
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/monitor/offday_manager.php");
    }    
?>