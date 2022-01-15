<?php
    session_start();
    require_once("../../models/task_operations.php");
    require_once("../../models/employee.php");
    require_once("../../models/upload.php");
    require_once("../../models/setup.php");

    $created_date = date("Y-m-d");
    $creator = isset($_SESSION["information"]) ? unserialize($_SESSION["information"])->getId() : "";
    $title = isset($_POST["title"]) ? $_POST["title"] : "";
    $receiver = isset($_POST["receiver"]) ? $_POST["receiver"] : "";
    $deadline = isset($_POST["deadline"]) ? date("Y-m-d", strtotime($_POST["deadline"])) : "";
    $desc = isset($_POST["desc"]) ? $_POST["desc"] : "";
    $attachment = isset($_FILES["attachment"]) ? $_FILES["attachment"] : "";

    try {
        if (!empty($creator) && !empty($title) && !empty($receiver) && !empty($deadline) && !empty($desc) && !empty($attachment)) {
            $task = new Task(null, $title, $desc, 0, 0, $creator, $receiver, $created_date, $deadline, date("Y-m-d"), "");
            $taskOperations = new TaskOperations;
            if ($taskOperations->create($task)) {
                $taskManager = $taskOperations->read();
                $task = unserialize($taskManager->getList()[count($taskManager->getList())-1]);
                $path = uploadTask($attachment, $created_date, $task->getId(), unserialize($_SESSION["information"])->getDepartment(), $receiver);
                if ($path != "") {
                    $task->setAttachment($path);
                    $result = $taskOperations->update($task);
                    $_SESSION["flag"] = $result;
                    if ($result) {
                        $_SESSION["message"] = "Thêm thành công";
                    } else {
                        $_SESSION["message"] = "Thêm thất bại";
                    }
                } else {
                    $_SESSION["flag"] = false;
                    $_SESSION["message"] = "Xảy ra lỗi không mong muốn trong quá trình xử lý";
                }
            }
        } else {
            $_SESSION["flag"] = false;
            $_SESSION["message"] = "Thông tin không hợp lệ";
        }
        header("location: ../../views/monitor/create_task.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");
    }
?>