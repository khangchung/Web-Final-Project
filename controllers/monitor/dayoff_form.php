<?php
    session_start();
    require_once("../../models/absence_operations.php");
    require_once("../../models/employee.php");
    require_once("../../models/upload.php");

    $created_date = date("Y-m-d");
    $start_date = isset($_POST["start_date"]) ? date("Y-m-d", strtotime($_POST["start_date"])) : "";
    $end_date = isset($_POST["end_date"]) ? date("Y-m-d", strtotime($_POST["end_date"])) : "";
    $reason = isset($_POST["reason"]) ? $_POST["reason"] : "";
    $attachment = isset($_FILES["attachment"]) ? $_FILES["attachment"] : "";
    $info = isset($_SESSION["information"]) ? unserialize($_SESSION["information"]) : "";
    
    if (!empty($start_date) && !empty($end_date) && !empty($reason) && !empty($attachment) && !empty($info)) {
        $path = uploadAbsense(
            $attachment,
            $created_date,
            $info->getDepartment(),
            $info->getId()
        );
        $absence = new Absence(null, $info->getId(), $created_date, $start_date, $end_date,
            $reason, 0, $path);
        $absenceOperations = new AbsenceOperations;
        $result = $absenceOperations->create($absence);
        $_SESSION["flag"] = $result;
        header("location: ../../views/monitor/form_offday.php");
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/monitor/form_offday.php");
    }
?>