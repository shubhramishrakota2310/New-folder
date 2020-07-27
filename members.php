<?php include('config.php');
	session_start(); 
	if ($_SESSION['user']['role']!='U')
    {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<html>
<head>
<title>Batches| TFPS</title>
</head>
<body>
<h1>Select Batch</h1>
<?php
$batch = array();
$year= date('Y'); 
for ($x = 0; $x < 5; $x++) 
{
  $batch[$x]=$year-$x;
}
?>
<a href="batch.php?id=<?php echo $batch[0]; ?>">First Year</a><br>
<a href="batch.php?id=<?php echo $batch[1]; ?>">Second Year</a><br>
<a href="batch.php?id=<?php echo $batch[2]; ?>">Third Year</a><br>
<a href="batch.php?id=<?php echo $batch[3]; ?>">Fourth Year</a><br>
<a href="batch.php?id=<?php echo $batch[4]; ?>">Fifth Year</a><br>
<a href="alums.php?id=<?php echo $batch[4]; ?>">Alumini</a>
<br><br>
<a href="dashboard.php">back</a>
<br><br>
<a style="color: red;" href="logout.php">Logout</a>
</body>
</html>	