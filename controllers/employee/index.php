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
            $_SESSION["information"] = serialize($employee);
            break;
        }
    }
    $taskOperations = new TaskOperations;
    $taskManager =  $taskOperations->read();
    $taskList = $taskManager->getList();
    $data = array();
    foreach ($taskList as $task) {
        $task = unserialize($task);
        if ($task->getReceiver() == $_SESSION["information"]->getId()) {
            array_push($data, serialize($task));
        }
    }
    $_SESSION["task"] = $data;
    header("location: ../../views/employee/index.php");
?>