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
                if (!$taskOperations->update($task)) {
                    $_SESSION["flag"] = false;
                }
            } else {
                if ($rate < 1) {
                    $task->setStatus(5);
                    $task->setRate($rate);
                    $task->setLastModified(date("Y-m-d"));
                    if (!$taskOperations->update($task)) {
                        $_SESSION["flag"] = false;
                    }
                } else {
                    $_SESSION["flag"] = false;
                }
            }
            if (!isset($_SESSION["flag"])) {
                $result = $taskOperations->update($task);
                $_SESSION["flag"] = $result;
            }
        } else {
            $_SESSION["flag"] = false;
        }
        header("location: index.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");
    }
?>