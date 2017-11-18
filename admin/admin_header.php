<?php 
session_start(); 
if(!$_SESSION['email'])
{
   header("Location:login.php"); //redirect to login page to secure the welcome page without login access.
}
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Khodiyar</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>
  <section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="#" class="navbar-brand" data-toggle="fullscreen"> Khodiyar </a>        
      </div>
      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown">
          
          <section class="dropdown-menu aside-xl on animated fadeInLeft no-borders lt">
          </section>
        </li>
      </ul>      
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
            <?php echo $_SESSION['email']?>  <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <span class="arrow top"></span>            
            <li class="divider"></li>
            <li>
              <a href="logout.php">Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-dark lter aside-md hidden-print" id="nav">          
          <section class="vbox">
            
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                
                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                  <ul class="nav">
                    <li  class="active">
                      <a href="admin.php"   class="active">
                        <i class="fa fa-dashboard icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span>DashBoard</span>
                      </a> 
                    </li>
                    <li  class="active">
                      <a href="device_insert_admin.php">
                        <i class="fa fa-unlock">
                          
                        </i>
                        <span>Order</span>
                      </a>
                    </li>
                    <li class="active">
                        <a href="change_password_admin.php">
                        <i class="fa fa-unlock">
                          <b></b>
                        </i>
                        <span>Ready Order</span>
                      </a>
                    </li>
                    <li  class="active">
                        <a href="manage_request.php">
                            <i class="fa fa-unlock">
                                <b></b>
                            </i>
                            <span>Manage Request</span>
                        </a>
                    </li>

                    <li class="active">
                        <a href="insert_plan.php">
                        <i class="fa fa-plus">
                          <b></b>
                        </i>
                        <span>Insert Plan</span>
                      </a>
                    </li>
 <!--                   <li  class="active">
                        <a href="rpt_soslist.php">
                            <i class="fa fa-plus">
                                <b></b>
                            </i>
                            <span>View SOS Num List</span>
                        </a>
                    </li> -->
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
          </section>
        </aside>
        <!-- /.aside -->
       