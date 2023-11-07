<?php
    session_start();

    if(empty($_SESSION["ACCOUNT_ID"])) {
        header("Location:./index.php");
        exit;
    }
?>

