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

<h5 style="margin-left: 20px; display: inline-block;">View All Equipments</h5>
    <input style="display: inline-block; float: right; margin: 12px;" type="text" id="myInput" onkeyup="myFunction1()" placeholder="Equipments Name">
<div class="w3-container" style="overflow-x:auto; margin-top: 8px;">
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white" id="myTable">
      <thead>
      <tr>
      <th><strong>Product Id</strong></th>
      <th><strong>Category</strong></th>
      <th><strong>Name</strong></th>
      <th><strong>Owner</strong></th>
      <th><strong>Currently With</strong></th>
      <th><strong>Contact No.</strong></th>
      <th><strong>Borrowed On</strong></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect('localhost', 'root', 'toorkgp12', 'tfpsqr');
      $sel_query="SELECT * from equipments ORDER BY id asc ";
      $result = mysqli_query($con,$sel_query);

      while($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
      <td align="center"><?php echo $row["id"]; ?></td>
      <td align="center"><?php echo $row["cat"]; ?></td>
      <td align="center"><?php echo $row["name"]; ?></td>
      <td align="center"><?php echo $row["owner"]; ?></td>
      <td align="center"><?php echo $row["owner2"]; ?></td>
      <td align="center"><?php echo $row["mobile"]; ?></td>
      <td align="center"><?php echo $row["bor_date"]; ?></td>
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
            td = tr[i].getElementsByTagName("td")[2];
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
