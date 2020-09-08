<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>LOGIN | TFPS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicons -->
<link href="TFPS_Logo-1.png" rel="icon">
  <link href="TFPS_Logo-1.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min1.css" rel="stylesheet">
  <!--external css-->
  
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" href="main.css">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/style.css">
  <link href="css/style-responsive.css" rel="stylesheet">
  



   
	
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

</head>
<body>

    <!--header start-->
    <header class="header black-bg">
        
        <!--logo start-->
        <a href="index.html" class="logo"><b>TF<span>PS</span></b></a>
        <!--logo end-->
       
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li><a class="logout" href="login.php">LOG IN</a></li>
            <li><a class="logout" href="register.php">SIGN UP</a></li>
            
          </ul>
        </div>
    </header>
      <!--header end-->

	<div class="hero-bg">
	

		
		<section class="authentic">
				
			<img  src="bg.svg" alt="">
		</section>
	<div class="form-container">
	<form method="post" action="login.php">
		<?php include('errors.php');?>
	<div class="input">
			<input type="text" name="username" placeholder = "Username">
	</div>
	<div class="input">
			<input type="password" name="password" placeholder = "Your Password">
	</div>
	<div class="input">
	<button type="submit" class="btn" name="login">Sign in</button>
	</div>
	</form>
	</div>
	
</div>


</body>
</form>