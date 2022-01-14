<?php
    session_start();
    require_once("../../models/absence_operations.php");
    require_once("../../models/department_operations.php");
    require_once("../../models/employee.php");
    require_once("../../models/setup.php");

    $employees = isset($_SESSION["employees"]) ? $_SESSION["employees"] : "";

    try {
        $absenceOperations = new AbsenceOperations;
        $absenceManager = $absenceOperations->read();
        $absenceList = $absenceManager->getList();
        $departmentOperations = new DepartmentOperations;
        $departmentManager = $departmentOperations->read();
        $departments = $departmentManager->getList();

        $data = array();
        if (!empty($employees)) {
            foreach ($absenceList as $absence) {
                $absence = unserialize($absence);
                foreach ($employees as $employee) {
                    $employee = unserialize($employee);
                    if ($employee->getId() == $absence->getEmployeeId() && $employee->getPosition() == 1) {
                        array_push($data, serialize($absence));
                    }
                }
            }
        }
        $_SESSION["absences"] = $data;
        $_SESSION["departments"] = $departments;
        header("location: ../../views/admin/offday_manager.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
?>