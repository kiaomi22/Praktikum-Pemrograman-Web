<?php
require "data.php";
$id = $_GET["id"];
unset($_SESSION["kontak"][$id]);
header("Location: index.php");
exit;
?>
