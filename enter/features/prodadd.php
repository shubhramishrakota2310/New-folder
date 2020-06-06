<?php 
	session_start();

	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', 'toorkgp12', 'tfpsqr');

	// REGISTER USER
	if (isset($_POST['add'])) {

		$cat = mysqli_real_escape_string($db, $_POST['cat']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$own = mysqli_real_escape_string($db, $_POST['ow']);
		$own1 = mysqli_real_escape_string($db, $_POST['ow2']);
		$mobil = mysqli_real_escape_string($db, $_POST['mob']);


		if (empty($cat)) { array_push($errors, "Category is required"); }
		if (empty($name)) { array_push($errors, "Product Name is required"); }
		if (empty($own)) { array_push($errors, "Enter Owner name"); }
		if (empty($own1)) { $own1 = $own; }
		if (empty($mobil)) { array_push($errors, "Enter mobile number of Current owner"); }

		if (count($errors) == 0) {

			$myDate = date('Y-m-d');
			$query = "INSERT INTO equipments (cat, name, owner, owner2, mobile, bor_date) 
					  VALUES('$cat', '$name', '$own', '$own1', '$mobil', '$myDate')";
			mysqli_query($db, $query);

			$_SESSION['success'] = "EQUIPMENT added successfully";
			header('location: products.php');
		}

	}

?>