<?php
include 'connection.php';
unset($_SESSION['id']);
unset($_SESSION['username']);
header("Location: index.php");
?>