<?php
    session_start();
    require_once("../../models/task_operations.php");
    require_once("../../models/setup.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : "";

    try {
        if (!empty($id)) {
            $taskOperations = new TaskOperations;
            $task = unserialize($taskOperations->read_one($id)->getList()[0]);
            $task->setStatus(2);
            $task->setLastModified(date("Y-m-d"));
            $result = $taskOperations->update($task);
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
        header("location: index.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");
    }
?>