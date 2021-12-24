<?php
    session_start();
    require_once("../../models/task_operations.php");
    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if (!empty($id)) {
        foreach ($_SESSION["task"] as $task) {
            if ($task->getId() == $id) {
                $_SESSION["task_details"] = $task;
                break;
            }
        }
        header("location: ../../views/employee/details_task.php");    
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/employee/index.php");
    }
?>