<?php
    session_start();
    require_once("../../models/absence_operations.php");
    require_once("../../models/upload.php");

    $created_date = date("Y-m-d");
    $start_date = isset($_POST["start_date"]) ? date("Y-m-d", strtotime($_POST["start_date"])) : "";
    $end_date = isset($_POST["end_date"]) ? date("Y-m-d", strtotime($_POST["end_date"])) : "";
    $reason = isset($_POST["reason"]) ? $_POST["reason"] : "";
    $attachment = isset($_FILES["attachment"]) ? $_FILES["attachment"] : "";
    
    if (!empty($numOfDay) && !empty($start_date) && !empty($end_date) && !empty($reason) && !empty($attachment)) {
        $absence = new Absence($_SESSION["information"]->getId(), $created_date, $start_date, $end_date,
            $reason, 0, upload(
                $attachment["tmp_name"],
                $attachment["name"],
                $_SESSION["information"]->getDeparment(),
                $_SESSION["information"]->getFullname(),
                "absense"
            ));
        $absenceOperations = new AbsenceOperations;
        $result = $absenceOperations->create($absence);
        $_SESSION["flag"] = $result;
        header("location: ../../views/employee/form_offday.php");
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/employee/form_offday.php");
    }
?>