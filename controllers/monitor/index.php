<?php
    session_start();
    require_once("../../models/employee_operations.php");
    require_once("../../models/task_operations.php");
    
    $employeeOperations = new EmployeeOperations;
    $employeeManager = $employeeOperations->read();
    $employeeList = $employeeManager->getList();

    foreach ($employeeList as $employee) {
        $employee = unserialize($employee);
        if ($employee->getUsername() == $_SESSION["username"]) {
            $year_current_date = date("Y");
            $year_previous_date = date("Y", strtotime("-1 day"));
            $year_distance = $year_current_date - $year_previous_date;
            if ($year_distance == 1) {
                $employee->setDayOf(15);
                $employeeOperations->update($employee);
            }
            $_SESSION["information"] = serialize($employee);
            break;
        }
    }

    if (isset($_SESSION["information"])) {
        $employee_data = array();
        foreach ($employeeList as $employee) {
            $employee = unserialize($employee);
            if ($employee->getDepartment() == unserialize($_SESSION["information"])->getDepartment()
                && $employee->getId() != unserialize($_SESSION["information"])->getId()) {
                array_push($employee_data, serialize($employee));
            }
        }
        $_SESSION["employees"] = $employee_data;
        $taskOperations = new TaskOperations;
        $taskManager =  $taskOperations->read();
        $taskList = $taskManager->getList();
        $task_data = array();
        foreach ($taskList as $task) {
            $task = unserialize($task);
            if ($task->getCreator() == unserialize($_SESSION["information"])->getId()) {
                array_push($task_data, serialize($task));
            }
        }
        $_SESSION["tasks"] = $task_data;
        if (isset($_SESSION["employees"]) && isset($_SESSION["tasks"])) {
            header("location: ../../views/monitor/index.php");
        }
    } else {
        header("location: ../../views/login.php");
    }
?>