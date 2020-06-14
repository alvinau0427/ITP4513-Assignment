<?php
 session_start();
 unset($_SESSION['UrlRedirect']);
 unset($_SESSION['authenticated']);
 unset($_SESSION['account']);
 unset($_SESSION['password']);
 unset($_SESSION['name']);
 unset($_SESSION['type']);
 header('Location: ../index.php');
 exit;
?>