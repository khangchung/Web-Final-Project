<?php
    require_once("employee_operations.php");
    require_once("absence.php");

    function getNextEmployeeID($department_id) {
        $id = "";
        $EO = new EmployeeOperations;
        $manager = $EO->read();
        $prefix = $department_id;
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

    function getNextDepartmentID() {
        $id = "";
        $alphabet = range('A', 'Z');
        $DO = new DepartmentOperations;
        $manager = $DO->read();
        $departmentList = $manager->getList();
        $number = count($departmentList) + 1;
        if ($number > 1) {
            $department = unserialize($departmentList[count($departmentList) - 1]);
            for ($i=0; $i < count($alphabet); $i++) { 
                if ($alphabet[$i] == $department->getId()) {
                    $id = $alphabet[$i + 1];
                    break;
                }
            }
        } else {
            $id = $alphabet[0];
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

    function createEmployeeFolder($department, $employee_id) {
        $path = "../../documents/" . $department . "/" . $employee_id;
        $avatarDefaultPath = "../../views/images/avatar.jpg";
        if (!is_dir($path)) {
            if (mkdir($path, 777, true)) {
                if (copy($avatarDefaultPath, $path . "/avatar.jpg")) {
                    return $path . "/avatar.jpg";
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
        if (!is_null($absences)) {
            foreach ($absences as $absence) {
                $absence = unserialize($absence);
                if ($absence->getStatus() == 1) {
                    $sum += getDateDistance($absence->getStartDate(), $absence->getEndDate());   
                }
            }   
        }
        return $sum;
    }
    
    function taskSorter($tasks) {
        $n = count($tasks);
        for ($i=0; $i < $n-1; $i++) { 
            for ($j=$i+1; $j < $n; $j++) { 
                $task1 = unserialize($tasks[$i]);
                $task2 = unserialize($tasks[$j]);
                if (getDateDistance($task1->getLastModified(), $task2->getLastModified()) > 0) {
                    $tmp = $tasks[$i];
                    $tasks[$i] = $tasks[$j];
                    $tasks[$j] = $tmp;
                }
            }
        }
        return $tasks;
    }

    function absenceSorter($absences) {
        $n = count($absences);
        for ($i=0; $i < $n-1; $i++) { 
            for ($j=$i+1; $j < $n; $j++) { 
                $absence1 = unserialize($absences[$i]);
                $absence2 = unserialize($absences[$j]);
                if (getDateDistance($absence1->getCreatedDate(), $absence2->getCreatedDate()) > 0) {
                    $tmp = $absences[$i];
                    $absences[$i] = $absences[$j];
                    $absences[$j] = $tmp;
                }
            }
        }
        return $absences;
    }

    function isSubmitBlock($absence) {
        $current_date = date("Y-m-d");
        if (!is_null($absence)) {
            if (getDateDistance($absence->getCreatedDate(), $current_date) >= 7) {
                return false;
            }
        }
        return true;
    }

    function getAbsenceNearCurrentDate($absences) {
        $result = null;
        $current_date = date("Y-m-d");
        $choose_date = null;
        $distance = null;
        foreach ($absences as $absence) {
            $absence = unserialize($absence);
            if (!is_null($distance)) {
                if (getDateDistance($absence->getCreatedDate(), $current_date) <= $distance) {
                    $result = $absence;
                    $choose_date = $absence->getCreatedDate();
                    $distance = getDateDistance($absence->getCreatedDate(), $current_date);
                }
            } else {
                $result = $absence;
                $choose_date = $absence->getCreatedDate();
                $distance = getDateDistance($absence->getCreatedDate(), $current_date);
            }
        }
        return $result;
    }

    function writeToErrorLog($log_message, $page_message) {
        $_SESSION["page_error_message"] = $log_message;
        error_log($log_message);
        header("location: ../../views/error_page.php");
    }
?>