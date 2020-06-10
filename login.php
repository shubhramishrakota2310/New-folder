<?php  include('server2.php'); ?>

<!DOCTYPE html>
<html>
<head>
<title>LOGIN | TFPS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="main.css">
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


	<?php 
		$prodid2 = $_POST['prodid1'];  
	?>
	<div class="hero-bg">
	<section class="top">

		</p>
		<section class="authentic">
				
			<img src="bg.svg" alt="">
		</section>
	<div class="form-container">
	<form method="post" action="login.php">
	<div class="input-group">
			<input type="text" name="username" placeholder = "Username">
	</div>
	<div class="input">
			<input type="password" name="passcode" placeholder = "Password">
	</div>
	<div class="input">
	<button type="submit" class="btn" name="reg_user">Sign in</button>
	
	
	</div>
	<div class="input">
           	<input type="hidden" name="prodid3" value="<?php echo $prodid2; ?>">
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