<?php
    session_start();
    require_once("../../models/task_log_operations.php");
    require_once("../../models/task_operations.php");
    require_once("../../models/employee.php");
    require_once("../../models/upload.php");

    $submit_date = date("Y-m-d");
    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $comment = isset($_POST["comment"]) ? $_POST["comment"] : "";
    $attachment = isset($_FILES["attachment"]) ? $_FILES["attachment"] : "";
    $department = isset($_SESSION["information"]) ? unserialize($_SESSION["information"])->getDepartment() : "";
    $employee_id = isset($_SESSION["information"]) ? unserialize($_SESSION["information"])->getId() : "";

    if (!empty($id) && !empty($comment) && !empty($attachment) && !empty($department) && !empty($employee_id)) {
        $taskOperations = new TaskOperations;
        $task = unserialize($taskOperations->read_one($id)->getList()[0]);
        $task->setStatus(3);
        $task->setLastModified(date("Y-m-d"));
        if ($taskOperations->update($task)) {
            $taskLogOperations = new TaskLogOperations;
            $taskLog = new TaskLog($id, $comment, uploadTaskLog($attachment, $submit_date, $id, $department, $employee_id), 0);
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