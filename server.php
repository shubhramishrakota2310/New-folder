<?php 
	include('config.php');
	/*use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';*/
	session_start();
	$username = "";
	$email    = "";
	$passcode = "";

	if (isset($_POST['reg_user'])) 
	{
		$errors = array(); 
		$username = esc($_POST['username']);
		$email = esc($_POST['email']);
		$passcode = esc($_POST['passcode']);

		if (empty($username)) {  array_push($errors, "Enter an Username."); }
		if (empty($email)) { array_push($errors, "Provide your Email Address"); }
		if (empty($passcode)) { array_push($errors, "You forgot to enter Password"); }

		$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
		$result = mysqli_query($conn, $user_check_query);
		$user = mysqli_fetch_assoc($result);

		if ($user) 
		{
			if ($user['username'] === $username) {
			  array_push($errors, "Username already taken");
			}
			if ($user['email'] === $email) {
			  array_push($errors, "Email already exists");
			}
		}

			if (count($errors) == 0) 
			{
			$pass1 = $passcode;
			$passcode = md5($passcode);

			$query = "INSERT INTO tempusers (username, email, password) 
					  VALUES('$username', '$email', '$passcode')";
			mysqli_query($conn, $query);
			$reg_user_id = mysqli_insert_id($conn); 

			$generator = "1357902468"; 
			$otp = ""; 
			for ($i = '1'; $i <= '5'; $i++) 
			{ 
        		$otp .= substr($generator, (rand()%(strlen($generator))), '1'); 
  			}
  			$query1 = "INSERT INTO otps (value, uid) 
					  VALUES('$otp', '$reg_user_id')";
			mysqli_query($conn, $query1);
			$otp_id = mysqli_insert_id($conn); 

				/*$mail = new PHPMailer;
				$mail->isSMTP(); 
				$mail->SMTPDebug = 0;
				$mail->Host = "smtp.gmail.com"; 
				$mail->Port = 587; 
				$mail->SMTPSecure = 'tls'; 
				$mail->SMTPAuth = true;
				$mail->Username = 'webdvaditya@gmail.com'; 
				$mail->Password = '#webdev4me'; 
				$mail->setFrom('system@tfps.com', 'TFPS'); 
				$mail->addAddress($email, $username);
				$mail->Subject = 'Signup Succesful';
				$mail->msgHTML("Hi ".$username.", You have been successfully registered at TFPS.<br>Your Account Details details are:<br>Username: <b>".$username."</b><br>Password: <b>".$pass1."</b><br>For verifying your account your OTP is :- <br><b>".$otp."</b><br>Thank You,<br>TFPS Admin");
				$mail->AltBody = 'HTML Texts Not Supported'; 
				$mail->SMTPOptions = array(
				                    'ssl' => array(
				                        'verify_peer' => false,
				                        'verify_peer_name' => false,
				                        'allow_self_signed' => true
				                    )
				                );
                $mail->send();*/

			$_SESSION['user'] = getUserById($reg_user_id);

			$_SESSION['message'] = "Verify your Email Address";
			header('location: otpverify.php?oid='.$otp_id);

		}
	}
	if (isset($_POST['login'])) 
	{
		$errors = array(); 
		$username = esc($_POST['username']);
		$password = esc($_POST['password']);
		
		if (empty($username)) {  array_push($errors, "Enter an Username."); }
		if (empty($password)) { array_push($errors, "You forgot to enter Password"); }
		if (empty($errors)) 
		{
			$password = md5($password);
			$sql = "SELECT * FROM users WHERE username='$username' aND password='$password' LIMIT 1";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > '0')
			{
				$reg_user_id = mysqli_fetch_assoc($result)['id']; 
				$_SESSION['user'] = GetById($reg_user_id); 
				if ( in_array($_SESSION['user']['role'], ["U"])) {
					$_SESSION['message'] = "You are now logged in";
					header('location: dashboard.php');
				} 
			} else {
				array_push($errors, 'Wrong Credentials');
			}
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
		$sql = "SELECT * FROM tempusers WHERE id = '$id' LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		return $user; 
	}
	function GetById($id)
	{
		global $conn;
		$sql = "SELECT * FROM users WHERE id = '$id' LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		return $user; 
	}
?>
