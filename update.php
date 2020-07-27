<?php 
include('config.php');
session_start();


if (isset($_POST['update'])) 
	{
		$errors = array(); 
		$mid = esc($_POST['mid']);
		$name = esc($_POST['name']);
		$rollno = esc($_POST['rollno']);
		$mobile = esc($_POST['mobile']);
		$image = $_FILES['image']['name'];
		$target = "users/" . basename($image);

		if (empty($name)) {  array_push($errors, "Enter Your Name."); }
		if (empty($rollno)) {  array_push($errors, "Enter your Roll Number."); }
		if (empty($mobile)) {  array_push($errors, "Enter your Mobile Number."); }

		$yr = substr($rollno, 0, 2);
		$batch = '20'.$yr;

		if (count($errors) == 0) 
		{
			if(empty($image)==1)
			{
				$q = "UPDATE users SET name='$name', rollno='$rollno', mobile='$mobile', batch='$batch' WHERE id='$mid'";
				mysqli_query($conn, $q);
				$_SESSION['user'] = getUserById($mid);
				$_SESSION['message'] = "Profile Successfully Updated.";
				header('location: dashboard.php');
			}
			
			else
			{
				$q = "UPDATE users SET name='$name', image='$image', rollno='$rollno', mobile='$mobile', batch='$batch' WHERE id='$mid'";
				mysqli_query($conn, $q);
				$_SESSION['user'] = getUserById($mid);
				if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
				{
		  		array_push($errors, "Failed to upload image.");
		  		}
		  		$_SESSION['message'] = "Profile Successfully Updated.";
				header('location: dashboard.php');
			}
		}
	}
	if (isset($_POST['updated'])) 
	{
		$errors = array(); 
		$mid = esc($_POST['mid']);
		$mobile = esc($_POST['mobile']);
		$image = $_FILES['image']['name'];
		$target = "users/" . basename($image);

		if(empty($image)=='1' AND empty($mobile)=='1')
		{
			array_push($errors, "Nothing to Update.");
		}

		if (count($errors) == 0) 
		{
			if(empty($image)=='1' AND empty($mobile)!='1')
			{
				$q = "UPDATE users SET mobile='$mobile' WHERE id='$mid'";
				mysqli_query($conn, $q);
				$_SESSION['message'] = "Profile Successfully Updated.";
				header('location: dashboard.php');
			}
			
			else if(empty($image)!='1' AND empty($mobile)=='1')
			{
				$q = "UPDATE users SET image='$image' WHERE id='$mid'";
				mysqli_query($conn, $q);
				if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
				{
		  		array_push($errors, "Failed to upload image.");
		  		}
		  		$_SESSION['message'] = "Profile Successfully Updated.";
				header('location: dashboard.php');
			}

			else 
			{
				$q = "UPDATE users SET image='$image', mobile='$mobile' WHERE id='$mid'";
				mysqli_query($conn, $q);
				if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
				{
		  		array_push($errors, "Failed to upload image.");
		  		}
		  		$_SESSION['message'] = "Profile Successfully Updated.";
				header('location: dashboard.php');
			}
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
		$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		return $user; 
	}
?>