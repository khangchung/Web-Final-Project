<?php
    session_start();
    require_once("../../models/absence_operations.php");
    
    $absenceOperations = new AbsenceOperations;
    $absenceManager = $absenceOperations->read();
    $absenceList = $absenceManager->getList();
    $data = array();
    foreach ($absenceList as $absence) {
        if ($absence->getEmployeeId() == $_SESSION["information"]->getId()) {
            array_push($data, serialize($absence));
        }
    }
    $_SESSION["absence"] = $data;
    header("location: ../../views/employee/offday_manager.php");
?>