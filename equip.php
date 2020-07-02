<!DOCTYPE html>
<html>
<head>
<title>TFPS | Equipments</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="main1.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="topnav" id="myTopnav">
    
    <a href="equipments.php"><h3>View Equipments</h3></a>
    <a href="./qrDNT"><h3>Borrow </h3></a>
    <a href="register.php"><h3>Sign up</h3></a>
    <a href="login.php"><h3>Sign in</h3></a>
    <a href="javascript:void(0);" class="icon"
    onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<div class="w3-container" style="overflow-x: auto;">
	<h5 style="margin-left: 20px; display: inline-block;">View Equipment Details</h5>
</div>

<?php
    $eid=$_REQUEST['id'];
    $con = mysqli_connect('localhost', 'root', 'toorkgp12', 'tfpsqr');
    $query = "SELECT * FROM equipments where id='$eid' LIMIT 1"; 
    $result1 = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result1);
?>

<div class="w3-container" style="overflow-x:auto; margin-top: 8px;">
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white" id="myTable">
      <thead>
      <tr>
      <th><strong>Product Id</strong></th>
      <th><strong><?php echo $row["id"]; ?></strong></th>
      </tr>
      <tr>
      <th><strong>Category</strong></th>
      <th><strong><?php echo $row["cat"]; ?></strong></th>
      </tr>
      <tr>
      <th><strong>Name</strong></th>
      <th><strong><?php echo $row["name"]; ?></strong></th>
      </tr>
      <tr>
      <th><strong>Owner</strong></th>
      <th><strong><?php echo $row["owner"]; ?></strong></th>
      </tr>
      <tr>
      <th><strong>Currently With</strong></th>
      <th><strong><?php echo $row["owner2"]; ?></strong></th>
      </tr>
      <tr>
      <th><strong>Contact No.</strong></th>
      <th><strong><?php echo $row["mobile"]; ?></strong></th>
      </tr>
      <tr>
      <th><strong>Borrowed On</strong></th>
      <th><strong><?php echo $row["bor_date"]; ?></strong></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
  </div>
    
    <script>

    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
    </script>



</body>
</html>
