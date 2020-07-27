<?php 
include('config.php');
include('add.php');
session_start();
if ($_SESSION['user']['role'] != "U") 
{
    header('location: login.php');
}
?>
<html>
<head>
	<title>TFPS | Add Equipments</title>
</head>
<body>
	<h4>Add Your Equipments</h4>
	<form method="post" action="addequip.php">
	<?php include('errors.php'); ?>
		<select name="categ">
          <?php
          $sel_query="SELECT * FROM categ ORDER BY id asc ";
          $result = mysqli_query($conn,$sel_query);
          while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
          <?php } ?>
        </select>
		<div class="input-group">
			<input type="text" name="name" placeholder="Equipment Name">
		</div>
		<div class="input-group">
			<input type="text" name="remark" placeholder="Remarks (If Any)">
		</div>
		<div class="input-group">
		<button type="submit" class="btn" name="add">Add Equipment</button>
		</div>
	</form>
<br><br>
<a href="myequip.php">Back</a>
<br><br>
<a style="color: red;" href="logout.php">Logout</a>
</body>
</html>