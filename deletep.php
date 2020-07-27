<?php
include('config.php');
$id=$_REQUEST['id'];
$query1 = "DELETE FROM equipment WHERE id='$id'"; 
$result = mysqli_query($conn,$query1) or die ( mysqli_error());
header("Location: myequip.php"); 
?>