<?php 
include('config.php');
include('update.php');
session_start();
if ($_SESSION['user']['role'] != "U") 
{
    header('location: login.php');
}
$mid = $_SESSION['user']['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Edit Profile | TFPS</title>

  <!-- Favicons -->
  <link href="TFPS_Logo-1.png" rel="icon">
  <link href="TFPS_Logo-1.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" href="main1.css">
 
 

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/style.css">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>


</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>TF<span>PS</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
          <?php if ($qnr!='0') : ?>
            <a data-toggle="dropdown" class="dropdown-toggle" href="notify.php">
              <i class="fa fa-bell-o"></i>
              &nbsp;<strong><?php echo $qnr; ?></strong>
              </a>
          <?php endif ?>
          <?php if ($qnr=='0') : ?>
            <a href="notify.php"><i class="fa fa-bell"></i></a>
          <?php endif ?>
          
            
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="users/<?php if(empty($_SESSION['user']['image'])!='1') { echo $_SESSION['user']['image']; } else { echo "userlogo.png"; } ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $_SESSION['user']['name'] ?></h5>
          <li class="mt">
            <a  href="dashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-camera"></i>
              <span>Equipment</span>
              </a>
            <ul class="sub">
              <li><a href="myequip.php">Owned by me</a></li>
              <li><a href="myhist.php">My borrow history</a></li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Inventory</span>
              </a>
            <ul class="sub">
              <li><a href="viewe.php">View</a></li>
              <li><a href="qrDNT/">Borrow</a></li>
              <li><a href="members.php">Members List</a></li>
            </ul>
          <li>
            <a class = "active" href="updatep.php">
              <i class="fa fa-edit"></i>
              <span> Edit my profile </span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
		<div class="hero-bg">
          <div class="col-lg-9 main-chart">
            <!-- /row -->
            <div class="row">
              <!-- /col-md-4-->
              <!-- DIRECT MESSAGE PANEL -->
              <div class="col-md-8 mb">
			  
	

					</p>
					
                  <div class="message-header">
                    <h5>Update your Profile</h5>
                  </div>
                  <div class="row">
                    <div class="col-md-3 centered hidden-sm hidden-xs">
                      <img src="users/<?php if(empty($_SESSION['user']['image'])!='1') { echo $_SESSION['user']['image']; } else { echo "userlogo.png"; } ?>" class="img-circle" width="65">
                    </div>
                    <div class="col-md-9">
                     
                      
                      <p class="message">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                      <div class="form-container">
					  <form class="form-inline" role="form" method="post" action="updateprofile.php" enctype="multipart/form-data">
                        
						<?php include('errors.php'); ?>
							<div class="input">
              <label for="file-upload" class="custom-file-upload">
                  <i class="fa fa-cloud-upload"></i> Custom Upload
              </label>
								<input id= "file-upload" type="file" name="image" accept="image/*">
							</div>
							<div class="input">
								<input type="number" name="mobile" placeholder="Your Contact Number">
							</div>
							<input type="hidden" name="mid" value="<?php echo $mid; ?>">
							<div class="input">
							<button type="submit" class="btn" name="updated">Update My Profile</button>
							</div>

						
                      </form>
					  </div>
                    </div>
		  			</div>
                </div>
                <!-- /Message Panel-->
              </div>
              <!-- /col-md-8  -->
            </div>
            
            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          <div class="col-lg-3 ds">
           
            
            <!-- USERS ONLINE SECTION -->
            <h4 class="centered mt">MODERATORS</h4>
            <!-- First Member -->
            <div class="desc">
              <div class="thumb">
                <img class="img-circle" src="shubhra.jpg" width="35px" height="35px" align="">
              </div>
              <div class="details">
                <p>
                  <a href="#">SHUBHRA MISHRA</a><br/>
                  <muted>GOVERNOR</muted>
                </p>
              </div>
            </div>
            <!-- Second Member -->
            <div class="desc">
              <div class="thumb">
                <img class="img-circle" src="aditya.jpg" width="35px" height="35px" align="">
              </div>
              <div class="details">
                <p>
                  <a href="#">ADITYA VERMA</a><br/>
                  <muted>MENTOR</muted>
                </p>
              </div>
            </div>
            
            <!-- CALENDAR-->
            <div id="calendar" class="mb">
              <div class="panel green-panel no-margin">
                <div class="panel-body">
                  <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                    <div class="arrow"></div>
                    <h3 class="popover-title" style="disadding: none;"></h3>
                    <div id="date-popover-content" class="popover-content"></div>
                  </div>
                  <div id="my-calendar"></div>
                </div>
              </div>
            </div>
            <!-- / calendar -->
          </div>
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>TFPS</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with love by 
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to TFPS!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button.',
        // (string | optional) the image to display on the left
        image: 'users/<?php if(empty($_SESSION['user']['image'])!='1') { echo $_SESSION['user']['image']; } else { echo "userlogo.png"; } ?>',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
