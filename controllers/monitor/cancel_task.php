<?php
    session_start();
    require_once("../../models/task_operations.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if (!empty($id)) {
        $taskOperations = new TaskOperations;
        $task = unserialize($taskOperations->read_one($id)->getList()[0]);
        $task->setStatus(2);
        $task->setLastModified(date("Y-m-d"));
        $result = $taskOperations->update($task);
        $_SESSION["flag"] = $result;
    } else {
        $_SESSION["flag"] = false;
    }

    header("location: index.php");
?>