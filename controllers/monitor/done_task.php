<?php
    session_start();
    require_once("../../models/task_operations.php");
    require_once("../../models/setup.php");

    $submit_date = date("Y-m-d");
    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    $rate = isset($_GET["rate"]) ? $_GET["rate"] : "";

    try {
        if (!empty($id) && !empty($rate)) {
            $taskOperations = new TaskOperations;
            $task = unserialize($taskOperations->read_one($id)->getList()[0]);
            if (getDateDistance($submit_date, $task->getDeadline()) >= 0) {
                $task->setStatus(5);
                $task->setRate($rate);
                $task->setLastModified(date("Y-m-d"));
                $result = $taskOperations->update($task);
                if ($result) {
                    $_SESSION["flag"] = true;
                    $_SESSION["message"] = "Cập nhật thành công";
                } else {
                    $_SESSION["flag"] = false;
                    $_SESSION["message"] = "Cập nhật thất bại";
                }
            } else {
                if ($rate < 1) {
                    $task->setStatus(5);
                    $task->setRate($rate);
                    $task->setLastModified(date("Y-m-d"));
                    $result = $taskOperations->update($task);
                    $_SESSION["flag"] = $result;
                } else {
                    $_SESSION["flag"] = false;
                    $_SESSION["message"] = "Thông tin không hợp lệ";
                }
            }
            if (isset($_SESSION["flag"]) && $_SESSION["flag"]) {
                $result = $taskOperations->update($task);
                if ($result) {
                    $_SESSION["flag"] = true;
                    $_SESSION["message"] = "Cập nhật thành công";
                } else {
                    $_SESSION["flag"] = false;
                    $_SESSION["message"] = "Cập nhật thất bại";
                }
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