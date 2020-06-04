<?php  include('config.php'); ?>
<?php include ('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Register | TFPS</title>
</head>
<body>
	<h2>REGISTER</h2>
	<form method="post" action="register.php">
	<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Be Choosy!">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Contact Number</label>
			<input type="number" name="mobile">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="passcode" placeholder="Don't Forget it">
		</div>
		 <div class="input-group">
			<label>Name</label>
			<input type="text" name="name" placeholder="Your Name">
		</div>
    	<div class="input-group">
			<label>Institute Roll Number</label>
			<input type="text" name="rollno">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Lets Go</button>
		</div>
	</form>

	<h4>Already a user? <a href="login.php">Login</a></h4>
</body>
</form>