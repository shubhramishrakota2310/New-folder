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
<title>View Equipment | TFPS</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
</head>
<body>
<?php 
		$pid = $_REQUEST['id'];
		$uid = $_SESSION['user']['id'];
     	$q = "SELECT * FROM equipment WHERE id = '$pid' AND oidd = '$uid' LIMIT 1";
		$result = mysqli_query($conn,$q);
		$row = mysqli_fetch_assoc($result);
?>
		<div>
			<h3 style="margin-left: 20px; display: inline-block;">Equipment Detail</h3>
		</div>
		<div style="overflow-x:auto; margin-top: 8px;">
		    <table style="border-collapse: collapse;border: 1px solid black;" id="myTable">
		      <thead>
		      <tr>
		      <th><strong>Category</strong></th>
		      <th><strong><?php echo $row["categname"]; ?></strong></th>
		      </tr>
		      <tr>
		      <th><strong>Equipment Name</strong></th>
		      <th><strong><?php echo $row["name"]; ?></strong></th>
		      </tr>
		      <tr>
		      <th><strong>Remarks</strong></th>
		      <th><strong><?php if(is_null($row["remarks"])=='1'){ echo "NA"; } else { echo $row["remarks"]; } ?></strong></th>
		      </tr>
		      <tr>
		      <th><strong>Currently With</strong></th>
		      <th><strong><?php if($row["cwid"]==$uid){ echo "You"; } else { echo $row["cwname"]; } ?></strong></th>
		      </tr>
		      <tr>
		      <th><strong>Contact Number</strong></th>
		      <th><strong><?php echo $row["cwnumb"]; ?></strong>&nbsp;<a href="https://wa.me/91<?php echo $row["cwnumb"]; ?>?text=Hi <?php echo $row["cwname"]; ?>"><i class="fa fa-whatsapp fa-2x" style="color: green;" aria-hidden="true"></i></a></th>
		      </tr>
		    </thead>
		    </table>
 		 </div>
<br><br>
<?php 
     	$q1 = "SELECT * FROM equiphist WHERE pid = '$pid' ORDER BY id desc";
		$result1 = mysqli_query($conn,$q1);
?>
		<div>
			<h3 style="margin-left: 20px; display: inline-block;">Equipment Borrow History</h3>
		</div>
		<?php if (mysqli_num_rows($result1) !='0') : ?>

		<div style="overflow-x:auto; margin-top: 8px;">
		    <table style="border-collapse: collapse;border: 1px solid black;" id="myTable">
		      <thead>
		      <tr>
		      <th><strong>Date</strong></th>
		      <th><strong>Borrowed From</strong></th>
		      <th><strong>Borrowed By</strong></th>
		      <th><strong>Borrower Contact Number</strong></th>
		      <th><strong>Remarks</strong></th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php
		      while($row1 = mysqli_fetch_assoc($result1)) { ?>
		      <tr>
		      <td align="center">
		      	<?php 
		      		$dt = new DateTime($row1["dated"]);
      				$date = $dt->format('d-m-Y');
      				echo $date; 
      			?>
      		  </td>
		      <td align="center"><?php if($row1["gid"]==$uid) { echo "You"; } else { echo $row1["gname"]; } ?></td>
		      <td align="center"><?php if($row1["tid"]==$uid) { echo "You"; } else { echo $row1["tname"]; } ?></td>
		      <td align="center"><?php echo $row1["tnumb"]; ?>&nbsp;<a href="https://wa.me/91<?php echo $row1["tnumb"]; ?>?text=Hi <?php echo $row1["tname"]; ?>"><i class="fa fa-whatsapp fa-2x" style="color: green;" aria-hidden="true"></i></a></td>
		      <td align="center"><?php if(is_null($row1["remark"])=='1'){ echo "NA"; } else { echo $row1["remark"]; } ?></td>
		      </tr>
		      <?php } ?>
		    </tbody>
		    </table>
 		 </div>
 		 <?php endif ?>
<?php if (mysqli_num_rows($result1) =='0') : ?>
		<h4>No Borrow History.</h4>
<?php endif ?>
<br><br>
<a style="color: red;" href="deletep.php?id=<?php echo $pid; ?>">Delete this Equipment</a>
<a href="myequip.php">Back</a>
<br><br>
<a style="color: red;" href="logout.php">Logout</a>
</body>
</html>
