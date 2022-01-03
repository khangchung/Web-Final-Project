<?php
    session_start();
    require_once("../../models/task_operations.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if (!empty($id)) {
        $taskOperations = new TaskOperations;
        $task = $taskOperations->read_one($id)->getList()[0];
        $task->setStatus(1);
        $result = $taskOperations->update($task);
        if (!$result) {
            $_SESSION["flag"] = false;
        }
    }

    header("location: task_details.php");
?>