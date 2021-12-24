<?php
    session_start();
    require_once("../../models/task_operations.php");
    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if (!empty($id)) {
        $taskOperations = new TaskOperations;
        $taskManager = $taskOperations->read_one($id);
        $_SESSION["task"] = $taskManager->getList()[0];
        header("location: ../../views/employee/details_task.php");    
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/employee/index.php");
    }
?>