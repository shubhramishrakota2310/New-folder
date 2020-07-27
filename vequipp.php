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
<title>View Equipments | TFPS</title>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
</head>
<body>
<?php 
		$pid = $_REQUEST['id'];
		$uid = $_SESSION['user']['id'];
     	$q = "SELECT * FROM equipment WHERE id='$pid' LIMIT 1";
		$result = mysqli_query($conn,$q);
		$row = mysqli_fetch_assoc($result)
?>
		<div>
			<h3 style="margin-left: 20px;">Equipment Details</h3>
		
		</div>
		</div>
		<div style="overflow-x:auto; margin-top: 8px;">
		    <table style="border-collapse: collapse;border: 1px solid black;" id="myTable">
		      <thead>
		      <tr>
		      <th><strong>Category</strong></th>
		      <th><strong><?php echo $row["categname"]; ?></strong></th>
		      <tr>
		      <tr>
		      <th><strong>Equipment Name</strong></th>
		      <th><strong><?php echo $row["name"]; ?></strong></th>
		      <tr>
		      <tr>
		      <th><strong>Owner</strong></th>
		      <th><strong><?php if($row["oidd"]==$uid){ echo "You"; } else { echo $row["oname"]; } ?></strong></th>
		      <tr>
		      <tr>
		      <th><strong>Owner Contact Number</strong></th>
		      <th><strong><strong><?php echo $row["onumb"]; ?></strong>&nbsp;<a href="https://wa.me/91<?php echo $row["onumb"]; ?>?text=Hi <?php echo $row["oname"]; ?>"><i class="fa fa-whatsapp fa-2x" style="color: green;" aria-hidden="true"></i></a></strong></th>
		      <tr>
		      <tr>
		      <th><strong>Currently With</strong></th>
		      <th><strong><?php if($row["cwid"]==$uid){ echo "You"; } else { echo $row["cwname"]; } ?></strong></th>
		      <tr>
		      <tr>
		      <th><strong>Contact Number</strong></th>
		      <th><strong><?php echo $row["cwnumb"]; ?></strong>&nbsp;<a href="https://wa.me/91<?php echo $row["cwnumb"]; ?>?text=Hi <?php echo $row["cwname"]; ?>"><i class="fa fa-whatsapp fa-2x" style="color: green;" aria-hidden="true"></i></a></th>
		      <tr>
		      <tr>
		      <th><strong>Remarks</strong></th>
		      <th><strong><?php if(is_null($row["remarks"])=='1'){ echo "NA"; } else { echo $row["remarks"]; } ?></strong></th>
		      <tr>
		    </thead>
		    </table>
 		 </div>
<br><br>
<a href="dashboard.php">Back</a>
<br><br>
<a style="color: red;" href="logout.php">Logout</a>
</body>
</html>
