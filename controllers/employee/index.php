<?php
    session_start();
    require_once("../../models/employee_operations.php");
    require_once("../../models/task_operations.php");
    require_once("../../models/task_log_operations.php");
    
    $employeeOperations = new EmployeeOperations;
    $employeeManager = $employeeOperations->read();
    $employeeList = $employeeManager->getList();

    if (isset($_SESSION["information"])) {
        foreach ($employeeList as $employee) {
            $employee = unserialize($employee);
            if ($employee->getUsername() == $_SESSION["username"]) {
                $_SESSION["information"] = serialize($employee);
                break;
            }
        }   
    }
    $taskOperations = new TaskOperations;
    $taskManager =  $taskOperations->read();
    $taskList = $taskManager->getList();
    $data = array();
    foreach ($taskList as $task) {
        $task = unserialize($task);
        if ($task->getReceiver() == unserialize($_SESSION["information"])->getId()) {
            array_push($data, serialize($task));
        }
    }
    $_SESSION["tasks"] = $data;
    $tasklogOperations = new TaskLogOperations;
    $tasklogManager =  $tasklogOperations->read();
    $tasklogList = $tasklogManager->getList();
    $data2 = array();
    foreach ($tasklogList as $tasklog) {
        $tasklog = unserialize($tasklog);
        if ($task->getReceiver() == unserialize($_SESSION["information"])->getId()) {
            array_push($data2, serialize($tasklog));
        }
    }
    $_SESSION["task_logs"] = $data2;
    header("location: ../../views/employee/index.php");
?>