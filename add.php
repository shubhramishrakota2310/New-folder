<?php 
include('config.php');
session_start();

if (isset($_POST['add'])) 
	{
		$name = esc($_POST['name']);
		$categid = esc($_POST['categ']);
		$remark = esc($_POST['remark']);
		$uid = $_SESSION['user']['id'];
	
		if (empty($name)) {  array_push($errors, "Enter Equipment's Name."); }
		if (empty($categid)) {  array_push($errors, "Choose Equipment's Category."); }

		if (count($errors) == 0) 
		{
				$q = "SELECT * FROM categ WHERE id='$categid' LIMIT 1";
				$r = mysqli_query($conn, $q);
				$a = mysqli_fetch_assoc($r);
				$catname = $a["name"];

				$q1 = "SELECT * FROM users WHERE id='$uid' LIMIT 1";
				$r1 = mysqli_query($conn, $q1);
				$a1 = mysqli_fetch_assoc($r1);
				$uname = $a1["name"];
				$umob = $a1["mobile"];

				if(empty($remark)=='1')
				{
					$q2 = "INSERT INTO equipment (categ, categname, name, oname, oidd, onumb, cwname, cwid, cwnumb) VALUES ('$categid', '$catname', '$name', '$uname', '$uid', '$umob', '$uname', '$uid', '$umob')";
					mysqli_query($conn, $q2);
			  		$_SESSION['message'] = "Equipment Successfully Added.";
					header('location: myequip.php');
				}
				else
				{
					$q2 = "INSERT INTO equipment (categ, categname, name, oname, oidd, onumb, cwname, cwid, cwnumb, remarks) VALUES ('$categid', '$catname', '$name', '$uname', '$uid', '$umob', '$uname', '$uid', '$umob', '$remark')";
					mysqli_query($conn, $q2);
			  		$_SESSION['message'] = "Equipment Successfully Added.";
					header('location: myequip.php');	
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
?>