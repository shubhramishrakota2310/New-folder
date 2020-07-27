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
<title>My Equipments | TFPS</title>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
</head>
<body>
<?php 
		$uid = $_SESSION['user']['id'];
     	$q = "SELECT * FROM equipment WHERE oidd = '$uid' ORDER BY id asc";
		$result = mysqli_query($conn,$q);
?>
<?php if (mysqli_num_rows($result) !='0') : ?>
		<div>
			<h3 style="margin-left: 20px; display: inline-block;">My Equipments</h3>
			<input style="display: inline-block; float: right; margin: 12px;" type="text" id="myInput" onkeyup="myFunction1()" placeholder="&nbsp;Search Equipment">
		</div>
		<div style="overflow-x:auto; margin-top: 8px;">
		    <table style="border-collapse: collapse;border: 1px solid black;" id="myTable">
		      <thead>
		      <tr>
		      <th><strong>Category</strong></th>
		      <th><strong>Equipment Name</strong></th>
		      <th><strong>Currently With</strong></th>
		      <th><strong>Contact Number</strong></th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php
		      while($row = mysqli_fetch_assoc($result)) { ?>
		      <tr>
		      <td align="center"><?php echo $row["categname"]; ?></td>
		      <td align="center"><a href="vequip.php?id=<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a></td>
		      <td align="center"><?php if($row["cwid"]==$uid){ echo "You"; } else { echo $row["cwname"]; } ?></td>
		      <td align="center"><?php echo $row["cwnumb"]; ?></strong>&nbsp;<a href="https://wa.me/91<?php echo $row["cwnumb"]; ?>?text=Hi <?php echo $row["cwname"]; ?>"><i class="fa fa-whatsapp fa-2x" style="color: green;" aria-hidden="true"></i></a></td>
		      </tr>
		      <?php } ?>
		    </tbody>
		    </table>
 		 </div>
<?php endif ?>
<?php if (mysqli_num_rows($result) =='0') : ?>
		<h4>No Equipments added yet.</h4>
<?php endif ?>
     <script>
        function myFunction1() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
	</script>
<br>
<a href="addequip.php">Add Your Equipments</a>
<br><br>
<a href="dashboard.php">Back</a>
<br><br>
<a style="color: red;" href="logout.php">Logout</a>
</body>
</html>
