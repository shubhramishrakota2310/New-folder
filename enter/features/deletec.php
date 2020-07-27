<?php
include('config.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM categ WHERE id='$id'"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: category.php"); 
?>