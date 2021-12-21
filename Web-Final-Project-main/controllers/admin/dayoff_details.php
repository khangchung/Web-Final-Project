<?php
    session_start();
    require_once("../../models/absence_operations.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if (!empty($id)) {
        $absenceOperations = new AbsenceOperations;
        $absenceManager = $absenceOperations->read_one($id);
        $_SESSION["absences"] = $absenceManager->getList()[0];
        header("location: ../../views/admin/details_offday.php");
    } else {
        $_SESSION["flag"] = false;
        header("location: ../../views/admin/offday_manager.php");
    }
?>