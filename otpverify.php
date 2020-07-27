<?php 
include('config.php');
include('verify.php');
session_start();
$otp = $_REQUEST['oid'];
?>
<html>
<head>
	<title>TFPS | Verify OTP</title>
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
	<form method="post" action="otpverify.php">
	<?php include('errors.php'); ?>
		<div class="input-group">
			<input type="number" name="otpinp" placeholder="Enter a 5 Digit OTP">
		</div>
		<input type="hidden" name="otp" value="<?php echo $otp; ?>">
		<div class="input-group">
		<button type="submit" class="btn" name="verify">Verify OTP</button>
		<div class=logIn_option><a href="login.php">Already a member? <span>Log in</span></a></div>
		</div>
	</form>
	</div>
</body>
</html>