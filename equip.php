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

<link rel="stylesheet" href="navbar.css">

	<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
    <script>
    $(function() {
    $(".toggle").on("click", function() {
        if ($(".item").hasClass("active")) {
            $(".item").removeClass("active");
        } else {
            $(".item").addClass("active");
        }
    });
});
    </script>


</head>
<body>

<nav>
        <ul class="menu">
            <li class="logo"><a href="index.html"><img src="Group 5.png" alt=""></a></li>
            <li class="item"><a href="equipments2.php">View Equipments</a></li>
            <li class="item"><a href="./qrDNT">Borrow</a></li>
            </li>
            <li class="item button"><a href="login.php">Log In</a></li>
            <li class="item button secondary"><a href="register.php">Sign Up</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>
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
    
   


</body>
</html>
