<?php 
	session_start();


	$username = "";
	$password    = "";
	$errors = array(); 
	$_SESSION['success'] = "";


	$db = mysqli_connect('localhost', 'root', 'toorkgp12', 'tfpsqr');

	if (isset($_POST['login_adm'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['passcode']);

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM verify WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: dashboard.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>