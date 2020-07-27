<?php 
include('config.php');
include('update.php');
session_start();
$mid = $_REQUEST['id'];
if ($_SESSION['user']['role'] != "U") 
{
    header('location: login.php');
}
?>
<html>
<head>
	<title>TFPS | Update Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="main.css">
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
            </li>
            <li class="item button"><a href="login.php">Log In</a></li>
            <li class="item button secondary"><a href="register.php">Sign Up</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>
	<div class="hero-bg">
	

		</p>
		<section class="authentic">
				
			<img src="bg.svg" alt="">
		</section>
	<div class="form-container">
	<h4>Your Account has been successfully Created.</h4>
	<h5>Update Your account Details</h5>
	<form method="post" action="updateprofile.php" enctype="multipart/form-data">
	<?php include('errors.php'); ?>
		<div class="input-group">
			<input type="text" name="name" placeholder="Your Name">
		</div>
		<div class="input-group">
			<input type="file" name="image" accept="image/*">
		</div>
		<div class="input-group">
			<input type="number" name="mobile" placeholder="Your Contact Number">
		</div>
		<div class="input-group">
			<input type="text" name="rollno" placeholder="Your Institute Roll Number">
		</div>
		<input type="hidden" name="mid" value="<?php echo $mid; ?>">
		<div class="input-group">
		<button type="submit" class="btn" name="update">Update My Profile</button>
		<a href="dashboard.php">Skip</a>
		</div>
	</form>
</div>
</body>
</html>