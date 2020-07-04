<!DOCTYPE html>
<html>
<head>
<title>TFPS | Equipments</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="main1.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<meta name="viewport" content="width=device-width, initial-scale=1">
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


</head>
<body>

<nav>
        <ul class="menu">
            <li class="logo"><a href="index.html"><img src="Group 5.png" alt=""></a></li>
            <li class="item"><a href="equipments2.php">View Equipments</a></li>
            <li class="item"><a href="./qrDNT">Borrow</a></li>
            </li>
            <li class="item button"><a href="login.php">Log In</a></li>
            <li class="item button secondary"><a href="register.php">Sign Up</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>
</div>
<div class="w3-container" style="overflow-x: auto;">
	<h5 style="margin-left: 20px; display: inline-block;">View Equipments</h5>
	<input style="display: inline-block; float: right; margin: 12px;" type="text" id="myInput" onkeyup="myFunction1()" placeholder="&nbsp;Search Equipments">
</div>
<div class="w3-container" style="overflow-x:auto; margin-top: 8px;">
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white" id="myTable">
      <thead>
      <tr>
      <th><strong>Category</strong></th>
      <th><strong>Name</strong></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect('localhost', 'root', 'toorkgp12', 'tfpsqr');
      $sel_query="SELECT * from equipments ORDER BY id asc ";
      $result = mysqli_query($con,$sel_query);

      while($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
      <td align="center"><?php echo $row["cat"]; ?></td>
      <td align="center"><a href="equip.php?id=<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a></td>
      </tr>
      <?php } ?>
    </tbody>
    </table>
  </div>
          <script>
        function myFunction1() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }

   
    </script>



</body>
</html>
