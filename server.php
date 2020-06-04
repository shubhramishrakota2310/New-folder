<?php 
	session_start();
	$username = "";
	$email    = "";
	$passcode = "";
	$errors = array(); 

	if (isset($_POST['reg_user'])) 
	{
		$username = esc($_POST['username']);
		$email = esc($_POST['email']);
		$passcode = esc($_POST['passcode']);
		$name = esc($_POST['name']);
		$roll = esc($_POST['rollno']);
		$contact = esc($_POST['mobile']);

		if (empty($username)) {  array_push($errors, "We are gonna an Username to address you."); }
		if (empty($email)) { array_push($errors, "Oops.. E-mail is missing"); }
		if (empty($passcode)) { array_push($errors, "Uh-Oh you forgot the passcode"); }
		if (empty($name)) { array_push($errors, "But we will need a name to address you."); }
		if (empty($roll)) { array_push($errors, "Please provide us your Roll Number"); }
		if (empty($contact)) { array_push($errors, "Please provide us your contact number"); }

		$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
		$result = mysqli_query($conn, $user_check_query);
		$user = mysqli_fetch_assoc($result);

		if ($user) 
		{
			if ($user['username'] === $username) {
			  array_push($errors, "Username already exists");
			}
			if ($user['email'] === $email) {
			  array_push($errors, "Email already exists");
			}
		}

			if (count($errors) == 0) 
			{
			$passcode = md5($passcode);

			$query = "INSERT INTO users (username, email, passcode, name, rollno, mobile) 
					  VALUES('$username', '$email', '$passcode', '$name', '$roll', '$contact')";
			mysqli_query($conn, $query);

			$reg_user_id = mysqli_insert_id($conn); 

			$_SESSION['user'] = getUserById($reg_user_id);

			$_SESSION['message'] = "You are now logged in";
			header('location: success.php');

		}
	}


//prevent force login
	function esc(String $value)
	{	
		global $conn;

		$val = trim($value);
		$val = mysqli_real_escape_string($conn, $value);

		return $val;
	}
	function getUserById($id)
	{
		global $conn;
		$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		return $user; 
	}
?>
