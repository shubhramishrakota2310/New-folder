<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../index.html');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../index.html");
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
</head>
<body>

	<div class="header">
		<h2>Home Page</h2>
	</div>
	<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<?php endif ?>
	<div class="content">
		<a href="features/users.php"><h1>MANAGE MEMBERS</h1></a>
		<a href="features/products.php"><h1>ADD EQUIPMENTS</h1></a>
	</div>
	<a href="<?php echo 'logout.php'; ?>" class="logout-btn">Logout</a>

</body>
</html>