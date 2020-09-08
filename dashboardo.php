<?php 
include('config.php');
include('update.php');
session_start();
if ($_SESSION['user']['role'] != "U") 
{
    header('location: login.php');
}
$mid = $_SESSION['user']['id'];
?>
<html>
<head>
	<title>TFPS | Update Profile</title>
</head>
<body>
	<h5>Update Your account Details</h5>
	<form method="post" action="updateprofile.php" enctype="multipart/form-data">
	<?php include('errors.php'); ?>
		<div class="input-group">
			<input type="file" name="image" accept="image/*">
		</div>
		<div class="input-group">
			<input type="number" name="mobile" placeholder="Your Contact Number">
		</div>
		<input type="hidden" name="mid" value="<?php echo $mid; ?>">
		<div class="input-group">
		<button type="submit" class="btn" name="updated">Update My Profile</button>
		</div>
	</form>
<br><br>
<a href="dashboard.php">Back</a>
<br><br>
<a style="color: red;" href="logout.php">Logout</a>
</body>
</html>