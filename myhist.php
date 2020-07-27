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
<title>Borrow History | TFPS</title>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
</head>
<body>
<?php 
		$uid = $_SESSION['user']['id'];
     	$q = "SELECT * FROM equiphist WHERE tid = '$uid' ORDER BY id desc";
		$result = mysqli_query($conn,$q);
?>
<?php if (mysqli_num_rows($result) !='0') : ?>
		<div>
			<h3 style="margin-left: 20px;">Borrow History</h3>
		</div>
		<div style="overflow-x:auto; margin-top: 8px;">
		    <table style="border-collapse: collapse;border: 1px solid black;" id="myTable">
		      <thead>
		      <tr>
		      <th><strong>Date</strong></th>
		      <th><strong>Category</strong></th>
		      <th><strong>Equipment Name</strong></th>
		      <th><strong>Borrowed From</strong></th>
		      <th><strong>Remarks</strong></th>
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
		      		$pid = $row["pid"];
		      		$q = "SELECT * FROM equipment WHERE id='$pid' LIMIT 1";
		      		$r = mysqli_query($conn, $q);
		      		$a = mysqli_fetch_assoc($r);
		      		echo $a["categname"];
		      	?>
		      </td>
		      <td align="center"><?php echo $a["name"]; ?></td>
		      <td align="center"><?php echo $row["gname"]; ?></td>
		      <td align="center"><?php if(is_null($row["remark"])=='1'){ echo "NA"; } else { echo $row["remark"]; } ?></td>
		      </tr>
		      <?php } ?>
		    </tbody>
		    </table>
 		 </div>
<?php endif ?>
<?php if (mysqli_num_rows($result) =='0') : ?>
		<h4>No Equipments borrowed yet.</h4>
<?php endif ?>
<br>
<a href="qrDNT/">Borrow an Equipment</a>
<br><br>
<a href="dashboard.php">Back</a>
<br><br>
<a style="color: red;" href="logout.php">Logout</a>
</body>
</html>
