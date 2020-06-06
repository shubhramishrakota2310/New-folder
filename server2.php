<?php 
	session_start();
	$conn = mysqli_connect("localhost", "root", "toorkgp12", "tfpsqr");
	$errors = array();

if (isset($_POST['login_btn'])) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['passcode']);
		$prd = mysqli_real_escape_string($conn, $_POST['prodid3']);

		if (empty($username)) {array_push($errors, "Enter Username."); }
		if (empty($password)) {array_push($errors, "Uh-Oh you forgot the passcode."); }

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND passcode='$password'";
			$results = mysqli_query($conn, $query);
			$reg_user_id = mysqli_fetch_assoc($results)['id']; 
			$_SESSION['user'] = getUserById($reg_user_id); 
			$name = $_SESSION['user']['name'];
			$phone = $_SESSION['user']['mobile'];
			$myDate = date('Y-m-d');

			if (mysqli_num_rows($results) == 1) {

				$query2 = "UPDATE equipments SET owner2='$name', mobile='$phone', bor_date='$myDate' WHERE id='$prd'";
				mysqli_query($conn, $query2);

				header('location: done.php');
			}else {
				array_push($errors, "Wrong username/password combination");
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
