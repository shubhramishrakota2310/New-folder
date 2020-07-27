<?php include('config.php');
    session_start(); 

    if ($_SESSION['user']['role']!='U')
    {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Borrow Equipment | TFPS</title>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<body>
    <h1>Scan the QR code of the Equipment</h1>
<div class="container">
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-danger">
      <div class="panel-body text-center" style="width: 300px; height: 300px; margin: auto;">
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
            $.redirectPost(redirect, {pid: result.code});
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
</body>
</html>