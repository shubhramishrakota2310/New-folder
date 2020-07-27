<?php 
include('config.php');
include('categadd.php');
	session_start(); 

	if ($_SESSION['user']['role']!='A') {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../enter/door.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../index.html");
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Category | ADMIN</title>
</head>
<body>
	<h2>Add a Category</h2>
	<form method="post" action="category.php">
	<?php include('errors.php'); ?>
	<div class="input-group">
			<label>Category Name</label>
			<input type="text" name="cat">
	</div>
	<div class="input">
			<button type="submit" class="btn" name="add">Add</button>
	</div>
	</form>
	<br><br>
	<?php 
     	$q = "SELECT * FROM categ ORDER BY id asc";
		$result = mysqli_query($conn,$q);
?>
<?php if (mysqli_num_rows($result) !='0') : ?>
		<div>
			<h3 style="margin-left: 20px; ">Avialable Categories</h3>
		</div>
		<div style="overflow-x:auto; margin-top: 8px;">
		    <table style="border-collapse: collapse;border: 1px solid black;" id="myTable">
		      <thead>
		      <tr>
		      <th><strong>Category Name</strong></th>
		      <th><strong>Delete</strong></th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php
		      while($row = mysqli_fetch_assoc($result)) { ?>
		      <tr>
		      <td align="center"><?php echo $row["name"]; ?></td>
		      <td align="center"><a href="deletec.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
		      </tr>
		      <?php } ?>
		    </tbody>
		    </table>
 		 </div>
<?php endif ?>
<?php if (mysqli_num_rows($result) =='0') : ?>
		<h4>No Categories avialable.</h4>
<?php endif ?>
<br><br>
	<a href="../dashboard.php"><h4>Back to Dashboard</h4></a>
	<br><br>
	<a style="color: red;" href="logout.php">Logout</a>
</body>
</html>