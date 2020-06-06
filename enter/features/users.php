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
	<title>MANAGE MEMBERS</title>
</head>
<body>
<div class="form">
	<h2>ALL Members</h2>
	<table>
		<thead>
			<tr>
			<th><strong>Sr.No</strong></th>
			<th><strong>Name</strong></th>
			<th><strong>Roll Number</strong></th>
			<th><strong>Contact Number</strong></th>
			<th><strong>Email</strong></th>
			<th><strong>Delete</strong></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$con = mysqli_connect('localhost', 'root', 'toorkgp12', 'tfpsqr');
			$count=1;
			$sel_query="Select * from users ORDER BY id asc;";
			$result = mysqli_query($con,$sel_query);
			while($row = mysqli_fetch_assoc($result)) { ?>
			<tr><td align="center"><?php echo $count; ?></td>
			<td align="center"><?php echo $row["name"]; ?></td>
			<td align="center"><?php echo $row["rollno"]; ?></td>
			<td align="center"><?php echo $row["mobile"]; ?></td>
			<td align="center"><?php echo $row["email"]; ?></td>
			<td align="center">
			<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
			</td>
			</tr>
			<?php $count++; } ?>
		</tbody>
	</table>
</div>


<a href="../dashboard.php"><h4>Back to Dashboard</h4></a>
</body>
</html>