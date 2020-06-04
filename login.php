<?php  include('server2.php'); ?>

<!DOCTYPE html>
<html>
<head>
<title>LOGIN | TFPS</title>
</head>
<body>
	<?php 
		$prodid2 = $_POST['prodid1'];  
	?>
	<h2>LOGIN TO CONTINUE</h2>
	<form method="post" action="login.php">
	<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
	</div>
	<div class="input">
			<label>Passcode</label>
			<input type="password" name="passcode">
	</div>
	<div class="input">
			<button type="submit" class="btn" name="login_btn">Login</button>
	</div>
	<div class="input">
           	<input type="hidden" name="prodid3" value="<?php echo $prodid2; ?>">
    </div>
	</form>
	<h4>Not a member? <a href="register.php">Sign Up</a></h4>
</body>
</form>