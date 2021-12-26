<?php
    session_start();
    require_once("../../models/absence_operations.php");

    $id = isset($_GET["id"]) ? intval($_GET["id"]) : "";
    
    if (!empty($id)) {
        $absenceOperations = new AbsenceOperations;
        $result = $absenceOperations->update($id);
        $_SESSION["flag"] = $result;
        header("location: ../../views/admin/offday_manager.php");
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/admin/details_offday.php.php");
    }
?>