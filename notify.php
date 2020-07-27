<?php include('config.php');
	session_start(); 
	if ($_SESSION['user']['role']!='U')
    {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<html>
<head>
<title>Notifications | TFPS</title>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
</head>
<body>
<?php 
		$uid = $_SESSION['user']['id'];
     	$q = "SELECT * FROM notif WHERE rid = '$uid' ORDER BY id desc";
		$result = mysqli_query($conn,$q);
?>
<?php if (mysqli_num_rows($result) !='0') : ?>
		<div>
			<h3 style="margin-left: 20px;">Notifications</h3>
		</div>
		<div style="overflow-x:auto; margin-top: 8px;">
		    <table style="border-collapse: collapse;border: 1px solid black;" id="myTable">
		      <thead>
		      <tr>
		      <th><strong>Date</strong></th>
		      <th><strong>Notification</strong></th>
		      <th><strong>By</strong></th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php
		      while($row = mysqli_fetch_assoc($result)) { ?>
		      <tr>
		      <td align="center">
		      	<?php 
		      		$dt = new DateTime($row["dated"]);
      				$date = $dt->format('d-m-Y');
      				echo $date; 
      			?>
      		  </td>
		      <td align="center">
		      	<?php 
		      		echo $row["noti"];
		      	?>
		      </td>
		      <td align="center"><?php echo $row["sname"]; ?></td>
		      </tr>
		      <?php } ?>
		    </tbody>
		    </table>
 		 </div>
 		 <br>
<a href="deletenotifications.php">Clear All</a>
<?php endif ?>
<?php if (mysqli_num_rows($result) =='0') : ?>
		<h4>No new notifications.</h4>
<?php endif ?>
<br><br>
<a href="dashboard.php">Back</a>
<br><br>
<a style="color: red;" href="logout.php">Logout</a>
</body>
</html>
