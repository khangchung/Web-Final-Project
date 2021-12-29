<?php
    session_start();
    require_once("../../models/absence_operations.php");
    
    $employees = isset($_SESSION["employees"]) ? $_SESSION["employees"] : "";
    $absenceOperations = new AbsenceOperations;
    $absenceManager = $absenceOperations->read();
    $absenceList = $absenceManager->getList();
    $data = array();
    foreach ($absenceList as $absence) {
        if ($absence->getEmployeeId() == $_SESSION["information"]->getId()) {
            array_push($data, serialize($absence));
        }
    }
    $_SESSION["my_absence"] = $data;
    if (!empty($employees)) {
        $data2 = array();
        foreach ($absenceList as $absence) {
            foreach ($employees as $employee) {
                $employee = unserialize($employee);
                if ($absence->getEmployeeId() == $employee->getId()) {
                    array_push($data2, serialize($absence));
                }   
            }
        }
        $_SESSION["employee_absence"] = $data2;   
    }
    header("location: ../../views/employee/offday_manager.php");
?>