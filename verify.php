<?php 
include('config.php');
session_start();
$otpinput = "";
$otpid = "";

if (isset($_POST['verify'])) 
	{
		$errors = array(); 
		$otpinput = esc($_POST['otpinp']);
		$otpid = esc($_POST['otp']);

		if (empty($otpinput)) {  array_push($errors, "Enter a 5 Digit OTP."); }

		$q = "SELECT * FROM otps WHERE id='$otpid' LIMIT 1";
		$r = mysqli_query($conn, $q);
		$a = mysqli_fetch_assoc($r);
		$orotp = $a["value"];
		$mid = $a["uid"];
		if($otpinput==$orotp)
		{
			$q1 = "SELECT * FROM tempusers WHERE id='$mid' LIMIT 1";
			$r1 = mysqli_query($conn, $q1);
			$a1 = mysqli_fetch_assoc($r1);
			$enu = $a1["username"];
			$ene = $a1["email"];
			$enp = $a1["password"];

			$q2 = "INSERT INTO users (username, password, email) VALUES ('$enu', '$enp', '$ene')";
			mysqli_query($conn, $q2);
			$reg_user_id = mysqli_insert_id($conn); 
			$_SESSION['user'] = getUserById($reg_user_id);
			$q3 = "DELETE FROM tempusers WHERE id='$mid'"; 
			mysqli_query($conn,$q3);
			$_SESSION['message'] = "Verification Successful";
			date_default_timezone_set("Asia/Kolkata");
			$dated = date("Y-m-d H:i:s");
			$noti = "Welcome to TFPS";
			$tname = "TFPS Admin";
            $q4 = "INSERT INTO notif (noti, rid, dated, sname) VALUES ('$noti', '$reg_user_id', '$dated', '$tname')";
			mysqli_query($conn, $q4);
			header('location: updateprofile.php?id='.$reg_user_id);
		}
		else
		{
			array_push($errors, "Incorrect OTP.");
		}
	}

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
		$sql = "SELECT * FROM users WHERE id = '$id' LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		return $user; 
	}
?>