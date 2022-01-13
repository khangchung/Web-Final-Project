<?php
    session_start();
    require_once("../../models/task_operations.php");
    require_once("../../models/task_log_operations.php");
    require_once("../../models/upload.php");

    $created_date = date("Y-m-d");
    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $comment = isset($_POST["comment"]) ? $_POST["comment"] : "";
    $attachment = isset($_POST["attachment"]) ? $_POST["attachment"] : "";
    $department = isset($_POST["department"]) ? $_POST["department"] : "";
    $employee_id = isset($_POST["employee_id"]) ? $_POST["employee_id"] : "";

    if (!empty($id) && !empty($comment) && !empty($attachment) && !empty($department) && !empty($employee_id)) {
        $taskOperations = new TaskOperations;
        $task = unserialize($TaskOperations->read_one($id)->getList()[0]);
        $task->setLastModified(date("Y-m-d"));
        if ($TaskOperations->update($task)) {
            $taskLogOperations = new TaskLogOperations;
            $taskLog = new TaskLog($id, $comment, uploadTaskLog($attachment, $created_date, $id, $department, $employee_id), 1);
            $result = $taskLogOperations->create($taskLog);
            $_SESSION["flag"] = $result;
        } else {
            $_SESSION["flag"] = false;   
        }
    } else {
        $_SESSION["flag"] = false;
    }

    header("location: index.php");
?>