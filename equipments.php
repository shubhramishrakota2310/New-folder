<!DOCTYPE html>
<html>
<head>
<title>TFPS | Equipments</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="topnav" id="myTopnav">
	
	<a href="equipments.php"><h3>View Equipments</h3></a>
	<a href="./qrDNT"><h3>Borrow </h3></a>
	<a href="register.php"><h3>Sign up</h3></a>
	<a href="login.php"><h3>Sign in</h3></a>
	<a href="javascript:void(0);" class="icon"
	onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr>
 <th>Product Id</th>
 <th>Category</th>
 <th>Name</th>
 <th>Owner</th>
 <th>Currently With</th>
 <th>Contact No.</th>
 <th>Borrowed On</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "toorkgp12";
$dbname = "tfpsqr";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, cat, name, owner, owner2, mobile, bor_date FROM equipments");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

<script>
	function myFunction() {
	  var x = document.getElementById("myTopnav");
	  if (x.className === "topnav") {
		x.className += " responsive";
	  } else {
		x.className = "topnav";
	  }
	}
	</script>



</body>
</html>