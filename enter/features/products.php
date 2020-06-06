<?php  include('prodadd.php'); ?>
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
<title>ADD PRODUCTS | ADMIN</title>
</head>
<body>
	<h2>FILL THE DETAILS TO ADD EQUIPMENT</h2>
	<form method="post" action="products.php">
	<?php include('errors.php'); ?>
	<div class="input-group">
			<label>Category</label>
			<input type="text" name="cat">
	</div>
	<div class="input-group">
			<label>Name of equipment</label>
			<input type="text" name="name">
	</div>
	<div class="input-group">
			<label>Owner</label>
			<input type="text" name="ow">
	</div>
	<div class="input-group">
			<label>Currently With</label>
			<input type="text" name="ow2" placeholder="Leave empty if its with owner.">
	</div>
	<div class="input-group">
			<label>Contact Number of current Owner</label>
			<input type="number" name="mob">
	</div>
	<div class="input">
			<button type="submit" class="btn" name="add">Add</button>
	</div>
	</form>
	<a href="../dashboard.php"><h4>Back to Dashboard</h4></a>
</body>
</html>