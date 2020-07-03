<?php  include('config.php'); ?>
<?php include ('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Register | TFPS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="topnav" id="myTopnav">
	<a href="equipments2.php"><h3>View Equipments</h3></a>
	<a href="./qrDNT"><h3>Borrow </h3></a>
	<a href="register.php"><h3>Sign up</h3></a>
	<a href="login.php"><h3>Sign in</h3></a>
	<a href="javascript:void(0);" class="icon"
	onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="hero-bg">
	<section class="top">

		</p>
		<section class="authentic">
				
			<img src="bg.svg" alt="">
		</section>
	<div class="form-container">
	<form method="post" action="register.php">
	<?php include('errors.php'); ?>
		<div class="input-group">
			<input type="text" name="username" placeholder="Username">
		</div>
		<div class="input-group">
			<input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email">
		</div>
		<div class="input-group">
			<input type="number" name="mobile" placeholder = "Contact Number">
		</div>
		<div class="input-group">
			<input type="password" name="passcode" placeholder="Password">
		</div>
		 <div class="input-group">
			<input type="text" name="name" placeholder="Name">
		</div>
    	<div class="input-group">
			<input type="text" name="rollno" placeholder = "Institute Roll Number">
		</div>
		<div class="input-group">
		<button type="submit" class="btn" name="reg_user">Register</button>
		<div class=logIn_option><a href="login.php">Already a member? <span>Log in</span></a></div>
		</div>
	</form>
	</div>
	</section>
</div>

<script>

let btn= document.getElementById('cda-btn');

btn.addEventListener('click', () => {
	 

})



</script>




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
</form>