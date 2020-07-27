<?php
include('config.php');
session_start();
$mid = $_SESSION['user']['id']; 
$q3 = "DELETE FROM notif WHERE rid='$mid'"; 
mysqli_query($conn ,$q3);
header("Location: dashboard.php"); 
?>