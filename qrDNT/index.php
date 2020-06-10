<!DOCTYPE html>
<html>
<head>
<title>Borrow Equipment | TFPS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<body>
<div class="container">
<div class="topnav" id="myTopnav">
	<a href="../equipments.php"><h3>View Equipments</h3></a>
	<a href="../qrDNT"><h3>Borrow </h3></a>
	<a href="../register.php"><h3>Sign up</h3></a>
	<a href="../login.php"><h3>Sign in</h3></a>
	<a href="javascript:void(0);" class="icon"
	onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
    <h4> <span>Scan the QR code </span> of the Equipment</h4>

<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-danger">
      <div class="panel-body text-center" >
        <canvas></canvas>
        <hr>
        <select></select>
      </div>
    </div>
  </div>

</div>
</div>


<!-- Js Lib -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/qrcodelib.js"></script>
<script type="text/javascript" src="js/webcodecamjquery.js"></script>
<script type="text/javascript">
    var arg = {
        resultFunction: function(result) {
            //$('.hasilscan').append($('<input name="noijazah" value=' + result.code + ' readonly><input type="submit" value="Cek"/>'));
           // $.post("../cek.php", { noijazah: result.code} );
            var redirect = '../checkout.php';
            $.redirectPost(redirect, {noijazah: result.code});
        }
    };
    
    var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
    decoder.buildSelectMenu("select");
    decoder.play();
    /*  Without visible select menu
        decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
    */
    $('select').on('change', function(){
        decoder.stop().play();
    });

    // jquery extend function
    $.extend(
    {
        redirectPost: function(location, args)
        {
            var form = '';
            $.each( args, function( key, value ) {
                form += '<input type="hidden" name="'+key+'" value="'+value+'">';
            });
            $('<form action="'+location+'" method="POST">'+form+'</form>').appendTo('body').submit();
        }
    });

</script>


<script>

let btn= document.getElementById('cda-btn');

btn.addEventListener('click', () => {
	 

})



</script>




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