<?php
    session_start();
    require_once("../../models/task_operations.php");
    $taskOperations = new TaskOperations;
    $taskManager =  $taskOperations->read();
    $_SESSION["task"] = $taskManager->getList();
    header("location: ../../views/employee/index.php");
?>