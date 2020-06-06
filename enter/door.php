<?php  include('serverdoor.php'); ?>

<!DOCTYPE html>
<html>
<head>
<title>LOGIN | ADMIN</title>
</head>
<body>
	<h2>WELCOME ADMIN</h2>
	<form method="post" action="door.php">
	<?php include('errors.php'); ?>
	<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
	</div>
	<div class="input">
			<label>Passcode</label>
			<input type="password" name="passcode">
	</div>
	<div class="input">
			<button type="submit" class="btn" name="login_adm">Login</button>
	</div>
	</form>
	<a href="../index.html"><h4>Back to site</h4></a>
</body>
</html>