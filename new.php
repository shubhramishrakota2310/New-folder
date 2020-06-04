$new = $_SESSION['user']['name'];
				$newph = $_SESSION['user']['mobile'];

				$sql1 = "UPDATE equipments SET owner2='$new' WHERE id='$prod'"; 
				if(mysqli_query($conn, $sql))
				{ 
   					 echo "Equipment borrow successful."; 
   					 header('location: done.php');
				} 
				else 
				{ 
    				echo "Equipment borrow unsuccessful."
				}	