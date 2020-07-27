<?php 
	include('config.php');
	session_start();
	$errors = array(); 
	$_SESSION['success'] = "";

	if (isset($_POST['add'])) 
	{
		$cat = mysqli_real_escape_string($conn, $_POST['cat']);


		if (empty($cat)) { array_push($errors, "Category is required"); }

		if (count($errors) == 0) {

			$query = "INSERT INTO categ (name) 
					  VALUES('$cat')";
			mysqli_query($conn, $query);

			$_SESSION['success'] = "Category added successfully";
			header('location: category.php');
		}

	}

?>