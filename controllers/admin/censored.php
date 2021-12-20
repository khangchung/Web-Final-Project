<?php
    session_start();
    require_once("../../models/absence_operations.php");
    require_once("../../models/absence.php");

    $id = isset($_POST["id"]) ? intval($_POST["id"]) : "";
    $employee_id = isset($_POST["employee_id"]) ? $_POST["employee_id"] : "";
    $created_date = isset($_POST["created_date"]) ? $_POST["created_date"] : "";
    $start_date = isset($_POST["start_date"]) ? $_POST["start_date"] : "";
    $end_date = isset($_POST["end_date"]) ? $_POST["end_date"] : "";
    $reason = isset($_POST["reason"]) ? $_POST["reason"] : "";
    $attachment = isset($_POST["attachment"]) ? $_POST["attachment"] : "";
    if (!empty($employee_id)) {
        $absence = new Absence($id, $employee_id, $created_date, $start_date, $end_date, $reason, 1, $attachment);
        $absenceOperations = new AbsenceOperations;
        $result = $absenceOperations->update();
        $_SESSION["flag"] = $result;
        header("location: ../../views/admin/offday_manager.php");
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/admin/details_offday.php.php");
    }
?>