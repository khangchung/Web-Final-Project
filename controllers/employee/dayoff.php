<?php
    session_start();
    require_once("../../models/absence_operations.php");
    require_once("../../models/employee.php");
    
    $absenceOperations = new AbsenceOperations;
    $absenceManager = $absenceOperations->read();
    $absenceList = $absenceManager->getList();
    $data = array();
    foreach ($absenceList as $absence) {
        $absence = unserialize($absence);
        if ($absence->getEmployeeId() == unserialize($_SESSION["information"])->getId()) {
            array_push($data, serialize($absence));
        }
    }
    $_SESSION["absence"] = $data;
    header("location: ../../views/employee/offday_manager.php");
?>