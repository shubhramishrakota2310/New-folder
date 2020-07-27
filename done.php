<?php include('config.php');
    session_start(); 

    if ($_SESSION['user']['role']!='U')
    {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
?>
<title>Borrow Successfull | TFPS</title>	
</head>
<body>
<audio autoplay loop="false">
  <source src="qrDNT/audio/success.mp3" type="audio/ogg">
  <source src="qrDNT/audio/success.mp3" type="audio/mpeg">
</audio>
<h1>Equipment borrow Successful.</h1>


<h3>This page will automatically redirect.</h3> 

<script type="text/javascript">
	setTimeout('Redirect()', 2500);


	function Redirect() 
	{
    	window.location = "<?php echo 'dashboard.php'; ?>";
    }

</script>

</body>
</html>



