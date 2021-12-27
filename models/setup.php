<?php
    require_once("employee_operations.php");

    function getNextID($department_name) {
        $EO = new EmployeeOperations;
        $manager = $EO->read();
        $prefix = strtoupper(substr($department_name, 0, 2));
        $number = count($manager->getList()) + 1;
        if ($number > 0 && $number <= 9) {
            $id = $prefix . "00" . $number;
        } else
        if ($number > 9 && $number <= 99) {
            $id = $prefix . "0" . $number;
        } else
        if ($number > 99 && $number <= 999) {
            $id = $prefix . $number;
        }
        return $id;
    }
    
    function getDateDistance($start_date, $end_date) {
        $datetime1 = date_create($start_date);
        $datetime2 = date_create($end_date);
        $interval = date_diff($datetime1, $datetime2);
        return $interval->d;
    }

    function fullnameFormatter($fullname) {
        $result = "";
        $words = explode(" ", $fullname);
        foreach ($words as $word) {
            $result .= strtolower($word);
        }
        return $result;
    }

    function getAvatarPath($department, $fullname) {
        return "../../documents/" . strtolower($department) . "/" . fullnameFormatter($fullname) . "/avatar.jpg";
    }
?>