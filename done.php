<?php  include('config.php'); ?>
<?php 
	session_start(); 
	if (!isset($_SESSION['user']['username']))
    {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<title>Success | TFPS</title>	
</head>
<body>
<audio autoplay loop="false">
  <source src="qrDNT/audio/success.mp3" type="audio/ogg">
  <source src="qrDNT/audio/success.mp3" type="audio/mpeg">
</audio>
<h1>Equipment borrow successful.</h1>


<?php if (isset($_SESSION['user'])): ?>
			<div class="user-info">
				<h1><?php echo $_SESSION['user']['name'] ?> You have successfully borrowed the equipment.</h1>
				<br>
				<h3>This page will automatically redirect.</h3> 
			</div>
<?php endif ?>


<script type="text/javascript">
	setTimeout('Redirect()', 2500);


	function Redirect() 
	{
    	window.location = "<?php echo 'logout.php'; ?>";
    }

</script>

</body>
</html>



