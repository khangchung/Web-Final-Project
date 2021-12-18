<?php
    require_once("employee_operations.php");

    function getNextID($department_name) {
        $EO = new EmployeeOperations;
        $manager = $EO->read();
        $prefix = strtoupper($department_name[0]);
        $number = count($manager->getList()) + 1;
        $id = $prefix . $number;
        return $id;
    }
    
    function getDateDistance($start_date, $end_date) {
        $datetime1 = date_create($start_date);
        $datetime2 = date_create($end_date);
        $interval = date_diff($datetime1, $datetime2);
        return $interval->d;
    }
?>