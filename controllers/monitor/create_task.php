<?php
    session_start();
    require_once("../../models/task_operations");
    require_once("../../models/employee.php");

    $created_date = date("Y-m-d");
    $creator = isset($_SESSION["information"]) ? unserialize($_SESSION["information"])->getId() : "";
    $title = isset($_POST["title"]) ? $_POST["title"] : "";
    $receiver = isset($_POST["receiver"]) ? $_POST["receiver"] : "";
    $deadline = isset($_POST["deadline"]) ? date("Y-m-d", strtotime($_POST["deadline"])) : "";
    $desc = isset($_POST["desc"]) ? $_POST["desc"] : "";
    $attachment = isset($_FILES["attachment"]) ? $_FILES["attachment"] : "";

    if (!empty($creator) && !empty($title) && !empty($receiver) && !empty($deadline) && !empty($desc) && !empty($attachment)) {
        
        $task = new Task(null, $title, $desc, 0, 0, $creator, $receiver, $created_date, $deadline,)
        $taskOperations = new TaskOperations;
        
        header("location: ../../views/monitor/create_task.php");
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/monitor/create_task.php");
    }
?>