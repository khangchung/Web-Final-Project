<?php
    session_start();
    require_once("../../models/task_log_operations.php");
    require_once("../../models/task_operations.php");
    require_once("../../models/employee.php");
    require_once("../../models/upload.php");
    require_once("../../models/setup.php");

    $submit_date = date("Y-m-d");
    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $comment = isset($_POST["comment"]) ? $_POST["comment"] : "";
    $attachment = isset($_FILES["attachment"]) ? $_FILES["attachment"] : "";
    $department = isset($_SESSION["information"]) ? unserialize($_SESSION["information"])->getDepartment() : "";
    $employee_id = isset($_SESSION["information"]) ? unserialize($_SESSION["information"])->getId() : "";

    try {
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
                if ($result) {
                    $_SESSION["message"] = "Cập nhật thành công";
                } else {
                    $_SESSION["message"] = "Cập nhật thất bại";
                }
            } else {
                $_SESSION["flag"] = false;
                $_SESSION["message"] = "Xảy ra lỗi không mong muốn trong quá trình xử lý";
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