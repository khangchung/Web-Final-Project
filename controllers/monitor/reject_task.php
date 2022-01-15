<?php
    session_start();
    require_once("../../models/task_operations.php");
    require_once("../../models/task_log_operations.php");
    require_once("../../models/upload.php");
    require_once("../../models/setup.php");

    $created_date = date("Y-m-d");
    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $comment = isset($_POST["comment"]) ? $_POST["comment"] : "";
    $attachment = isset($_POST["attachment"]) ? $_POST["attachment"] : null;
    $department = isset($_POST["department"]) ? $_POST["department"] : "";
    $employee_id = isset($_POST["employee_id"]) ? $_POST["employee_id"] : "";

    try {
        if (!empty($id) && !empty($comment) && !empty($department) && !empty($employee_id)) {
            $taskOperations = new TaskOperations;
            $task = unserialize($taskOperations->read_one($id)->getList()[0]);
            $task->setLastModified(date("Y-m-d"));
            $task->setStatus(4);
            if ($taskOperations->update($task)) {
                $taskLogOperations = new TaskLogOperations;
                $taskLog = new TaskLog($id, $comment, uploadTaskLog($attachment, $created_date, $id, $department, $employee_id), 1);
                $result = $taskLogOperations->create($taskLog);
                $_SESSION["flag"] = $result;
                if ($result) {
                    $_SESSION["message"] = "Cập nhật thành công";
                } else {
                    $_SESSION["message"] = "Cập nhật thất bại";
                }
            } else {
                $_SESSION["flag"] = false;
                $_SESSION["message"] = "Thông tin không hợp lệ";
            }
        } else {
            $_SESSION["flag"] = false;
            $_SESSION["message"] = "Thông tin không hợp lệ";
        }
        header("location: index.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");
    }
?>