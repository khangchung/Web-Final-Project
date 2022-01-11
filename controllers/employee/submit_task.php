<?php
    session_start();
    require_once("../../models/task_log_operations.php");
    require_once("../../models/upload.php");

    $submit_date = new Date("Y-m-d");
    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $comment = isset($_POST["id"]) ? $_POST["id"] : "";
    $attachment = isset($_POST["id"]) ? $_POST["id"] : "";
    $department = isset($_SESSION["information"]) ? unserialize($_SESSION["information"])->getDepartment() : "";
    $employee_id = isset($_SESSION["information"]) ? unserialize($_SESSION["information"])->getId() : "";

    if (!empty($id) && !empty($comment) && !empty($attachment) && !empty($department) && !empty($employee_id)) {
        $taskLogOperations = new TaskLogOperations;
        $taskLog = new TaskLog($id, $comment, uploadTaskLog($attachment, $submit_date, $id, $department, $employee_id));
        $result = $taskLogOperations->create($taskLog);
        if (!$result) {
            $_SESSION["flag"] = false;
        }
    } else {
        $_SESSION["flag"] = false;
    }

    header("location: task_details.php");
?>