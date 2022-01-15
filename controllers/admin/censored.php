<?php
    session_start();
    require_once("../../models/absence_operations.php");
    require_once("../../models/setup.php");

    $id = isset($_GET["id"]) ? intval($_GET["id"]) : "";
    $option = isset($_GET["option"]) ? $_GET["option"] : "";
    
    try {
        if (!empty($id) && !empty($option)) {
            $status = $option == "approve" ? 1 : -1;
            $absenceOperations = new AbsenceOperations;
            $absenceManager = $absenceOperations->read_one($id);
            $absence = $absenceManager->getList()[0];
            $absence = unserialize($absence);
            $absence->setStatus($status);
            $result = $absenceOperations->update($absence);
            $_SESSION["flag"] = $result;
            if ($result) {
                $_SESSION["message"] = "Duyệt thành công";
            } else {
                $_SESSION["message"] = "Duyệt thất bại";
            }
            header("location: dayoff.php");
        } else {
            $_SESSION["flag"] = false;
            $_SESSION["message"] = "Thông tin không hợp lệ";
            header("location: dayoff_details.php");
        }
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
?>