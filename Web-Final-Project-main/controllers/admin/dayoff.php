<?php
    session_start();
    require_once("../../models/absence_operations.php");
    $absenceOperations = new AbsenceOperations;
    $absenceManager = $absenceOperations->read();
    $_SESSION["absences"] = $absenceManager->getList();
    header("location: ../../views/admin/offday_manager.php");
?>