<?php
include('config.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM users WHERE id='$id'"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
$query1 = "DELETE FROM equipment WHERE oidd='$id'"; 
$result = mysqli_query($conn,$query1) or die ( mysqli_error());
header("Location: users.php"); 
?>