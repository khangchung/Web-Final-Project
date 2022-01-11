<?php
    session_start();
    require_once("../../models/task_log_operations.php");
    require_once("../../models/upload.php");

    $created_date = new Date("Y-m-d");
    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $comment = isset($_POST["comment"]) ? $_POST["comment"] : "";
    $attachment = isset($_POST["attachment"]) ? $_POST["attachment"] : "";
    $department = isset($_POST["department"]) ? $_POST["department"] : "";
    $employee_id = isset($_POST["employee_id"]) ? $_POST["employee_id"] : "";

    if (!empty($id) && !empty($comment) && !empty($attachment) && !empty($department) && !empty($employee_id)) {
        $taskLogOperations = new TaskLogOperations;
        $taskLog = new TaskLog($id, $comment, uploadTaskLog($attachment, $created_date, $id, $department, $employee_id));
        $result = $taskLogOperations->create($taskLog);
        if (!$result) {
            $_SESSION["flag"] = false;
        }
    } else {
        $_SESSION["flag"] = false;
    }

    header("location: index.php");
?>