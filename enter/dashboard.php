<?php 
include('config.php');
	session_start(); 

	if ($_SESSION['user']['role']!='A') {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../enter/door.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin | TFPS</title>
</head>
<body>
<a href="features/users.php"><h3>Manage Members</h3></a><br>
<a href="features/category.php"><h3>Manage Categories</h3></a><br><br>
<a style="color: red;" href="logout.php">Logout</a>
</body>
</html>