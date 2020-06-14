<?php
    session_start();
    $_SESSION["assign"][$_GET['bookingID']] = "true";
    require_once("connection/conn.php");
    
    
    $sql = "select * from flightbooking where BookingID = {$_GET['bookingID']}" ;
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $rc = mysqli_fetch_assoc($rs);
    $sql = "update customer set BonusPoint = BonusPoint + {$rc['TotalAmt']} where CustID = '{$rc['CustID']}'";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("Location: ../index.php?function=search-passenger");
?>