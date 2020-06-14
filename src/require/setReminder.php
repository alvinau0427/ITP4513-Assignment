<?php
    session_start();
    if ($_GET['boolean'] == "false"){
        $_SESSION["reminder"][$_GET['bookingID']] = $_GET['bookingID'];
    } else {
        unset($_SESSION["reminder"][$_GET['bookingID']]);
    }
    header("Location: ../index.php?function=view-booking");
?>