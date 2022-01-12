<?php
    session_start();
    require_once("../../models/task_operations.php");
    require_once("../../models/task_log_operations.php");
    
    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if (!empty($id)) {
        foreach ($_SESSION["tasks"] as $task) {
            $task = unserialize($task);
            if ($task->getId() == $id) {
                $taskLogOperations = new TaskLogOperations;
                $task_logs = $taskLogOperations->read()->getList();
                $data = array();
                foreach ($task_logs as $task_log) {
                    $task_log = unserialize($task_log);
                    if ($task_log->getTaskId() == $task->getId()) {
                        array_push($data, serialize($task_log));
                    }
                }
                $_SESSION["task"] = serialize($task);
                $_SESSION["task_logs"] = $data;
                break;
            }
        }
        header("location: ../../views/employee/details_task.php");    
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/employee/index.php");
    }
?>