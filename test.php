<?php
    require_once("models/setup.php");
    $datetime1 = '2017-05-1';
    $datetime2 = '2017-05-20';
    echo getDateDistance($datetime1, $datetime2);
    echo password_hash(123456, PASSWORD_DEFAULT);
?>