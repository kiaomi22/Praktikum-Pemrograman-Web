<?php
session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: session-login.php");
    exit;
}

if (!isset($_SESSION["kontak"])) {
    $_SESSION["kontak"] = [];
}
?>
