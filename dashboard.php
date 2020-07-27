<?php include('config.php');
	session_start(); 

	if ($_SESSION['user']['role']!='U')
    {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	 $uid = $_SESSION['user']['id'];
	 $qq = "SELECT * FROM notif WHERE rid='$uid'";
  	 $qr = mysqli_query($conn, $qq);
  	 $qnr = mysqli_num_rows($qr);
?>
<html>
<head>
<title>Dashboard | TFPS</title>	
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="navbar.css">
	
	<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
    <script>
    $(function() {
    $(".toggle").on("click", function() {
        if ($(".item").hasClass("active")) {
            $(".item").removeClass("active");
        } else {
            $(".item").addClass("active");
        }
    });
});
    </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
</head>
<body>
<nav>
        <ul class="menu">
            <li class="logo"><a href="index.html"><img src="Group 5.png" alt=""></a></li>
            <li class="item"><a href="equipments2.php">View Equipments</a></li>
            </li>
            <li class="item button"><a href="login.php">Log In</a></li>
            <li class="item button secondary"><a href="register.php">Sign Up</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>
	<div class="hero-bg">
	

		</p>
		
<h1>Welcome<?php echo $_SESSION['user']['name'] ?></h1>
<img src="users/<?php if(empty($_SESSION['user']['image'])!='1') { echo $_SESSION['user']['image']; } else { echo "userlogo.png"; } ?>" style="height: 214px; width: 224px;"/>
<br>
<br>
<h3>Notifications</h3>
<?php if ($qnr!='0') : ?>
          <a href="notify.php"><i style="color: #ffa500;" class="fa fa-bell"></i>&nbsp;<strong><?php echo $qnr; ?></strong></a>
<?php endif ?>
<?php if ($qnr=='0') : ?>
          <a href="notify.php"><i class="fa fa-bell"></i></a>
<?php endif ?>
<br>
<br>
<h3>Available Services</h3>
<br>
<a href="myequip.php">My Equipments</a><br>
<a href="myhist.php">My Borrow History</a><br>
<a href="viewe.php">See All Equipments</a><br>
<a href="qrDNT/">Borrow Equipments</a><br>
<a href="members.php">See All Members</a><br>
<a href="updatep.php">Update Profile Details</a>
<br><br>
<a style="color: red;" href="logout.php">Logout</a>
</body>
</html>
