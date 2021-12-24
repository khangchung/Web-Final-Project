<?php
    session_start();
    require_once("../../models/absence_operations.php");
    require_once("../../models/absence.php");
    require_once("../../models/upload.php");
    $numOfDay = isset($_POST["num_of_day"]) ? $_POST["num_of_day"] : "";
    $created_date = date("Y/m/d");
    $start_date = isset($_POST["start_date"]) ? $_POST["start_date"] : "";
    $end_date = isset($_POST["end_date"]) ? $_POST["end_date"] : "";
    $reason = isset($_POST["reason"]) ? $_POST["reason"] : "";
    $attachment = isset($_FILES["attachment"]) ? $_FILES["attachment"] : "";
    if (!empty($numOfDay) && !empty($start_date) && !empty($end_date) && !empty($reason) && !empty($attachment)) {
        $absence = new Absence($_SESSION["information"]->getId(), $created_date, $start_date, $end_date,
            $numOfDay, $reason, 0, upload(
                $attachment["tmp_name"],
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