<?php
    require_once("employee_operations.php");
    require_once("absence.php");

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
        return $interval->d + 1;
    }

    function nameFormatter($fullname) {
        $result = "";
        $words = explode(" ", $fullname);
        foreach ($words as $word) {
            $result .= strtolower($word);
        }
        return $result;
    }

    function dateFormatter($dateString) {
        return date("d/m/Y", strtotime($dateString));
    }

    function createEmployeeFolder($department, $fullname) {
        $department = nameFormatter($department);
        $fullname = nameFormatter($fullname);
        $path = "../../documents/" . $department . "/" . $fullname;
        $avatarDefaultPath = "../../views/images/avatar.jpg";
        if (!file_exists($path)) {
            if (mkdir($path)) {
                $path .= "/avatar.jpg";
                if (copy($avatarDefaultPath, $path)) {
                    return $path;
                }
            }
        }
        return "";
    }

    function priorityChecker($priority) {
        if ($_SESSION["priority"] != $priority) {
            if (isset($_SESSION["URL"])) {
                header("location: " . $_SESSION["URL"]);
            }
        } else {
            $_SESSION["URL"] = $_SERVER["REQUEST_URI"];
        }
    }

    function getFilenameOf($path) {
        $filename = "";
        $words = explode("/", $path);
        $filename = $words[count($words) - 1];
        return $filename;
    }

    function isValid() {
        $flag = isset($_SESSION["flag"]) ? $_SESSION["flag"] : "";
        if (!empty($flag)) {
            if ($flag) {
                return 1;
            } else {
                return -1;
            }
            session_unset($_SESSION["flag"]);
        } else {
            return 0;
        }
    }

    function countDayOff($absences) {
        $sum = 0;
        foreach ($absences as $absence) {
            $absence = unserialize($absence);
            if ($absence->getStatus() == 1) {
                $sum += getDateDistance($absence->getStartDate(), $absence->getEndDate());   
            }
        }
        return $sum;
    }
?>