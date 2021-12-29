<?php
    session_start();
    require_once("../../models/absence_operations.php");
    require_once("../../models/employee.php");
    
    $employees = isset($_SESSION["employees"]) ? $_SESSION["employees"] : "";
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
    $_SESSION["my_absence"] = $data;
    if (!empty($employees)) {
        $data2 = array();
        foreach ($absenceList as $absence) {
            $absence = unserialize($absence);
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