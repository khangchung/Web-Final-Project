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
            $current_year = date("Y");
            $absence_year = date("Y", strtotime($absence->getCreatedDate()));
            $year_distance = $current_year - $absence_year;
            if ($year_distance == 0) {
                array_push($data, serialize($absence));
            }
        }
    }
    $_SESSION["absences"] = $data;
    header("location: ../../views/employee/offday_manager.php");
?>