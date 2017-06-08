<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Cluster Slimme Spiegel</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>Cluster Slimme Spiegel</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><img src="assets/img/ui-slimmespiegel.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $login_session; ?></h5>
              	  	
                  <li class="mt">
                      <a 
                          <?php if($page == "index"){ ?> class='active' <?php } else { }?> 
                          href="index.php">
                          <i class="fa fa-cogs"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                      <a 
                          <?php if($page == "time"){ ?> class='active' <?php } else { }?>
                          href="time.php">
                          <i class="fa fa-cogs"></i>
                          <span>Time</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                      <a 
                          <?php if($page == "weather"){ ?> class='active' <?php } else { }?>
                          href="weather.php">
                          <i class="fa fa-cogs"></i>
                          <span>Weather</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                      <a 
                          <?php if($page == "news"){ ?> class='active' <?php } else { }?>
                          href="news.php">
                          <i class="fa fa-cogs"></i>
                          <span>News</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                      <a 
                          <?php if($page == "radio"){ ?> class='active' <?php } else { }?>
                          href="radio.php">
                          <i class="fa fa-cogs"></i>
                          <span>Radio</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                      <a 
                          <?php if($page == "calendar"){ ?> class='active' <?php } else { }?>
                          href="calendar.php">
                          <i class="fa fa-cogs"></i>
                          <span>Calendar</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                      <a 
                          <?php if($page == "wifi"){ ?> class='active' <?php } else { }?>
                          href="wifi.php">
                          <i class="fa fa-cogs"></i>
                          <span>WiFi settings</span>
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
      
          	

</html>