<?php
    session_start();
    header("Access-Control-Allow-Origin: *");
    require_once("../../models/upload.php");
    require_once("../../models/employee.php");

    $img = isset($_FILES["image"]) ? $_FILES["image"] : "";
    $info = isset($_SESSION["information"]) ? unserialize($_SESSION["information"]) : "";

    if (!empty($img)) {
        if (!empty($info)) {
            if (uploadAvatar($img, $info->getDepartment(), $info->getId()) != "") {
                http_response_code(200);
            } else {
                http_response_code(501);    
            }
        } else {
            http_response_code(501);
        }
    } else {
        http_response_code(400);
    }
?>