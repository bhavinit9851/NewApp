<?php
include 'db_connection.php';
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) 
    {
     if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
        }
    else
    {
// Define $email and $password
    $email=$_POST['email'];
    $password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
// To protect MySQL injection for Security purpose
    $email = stripslashes($email);
    $password = stripslashes($password);
    $email = mysqli_real_escape_string($email);
    $password = mysqli_real_escape_string($password);
// Selecting Database
// SQL query to fetch information of registerd users and finds user match.
    $result = $con-> mysqli_query("select * from mst_user where email='$email' AND password='$password'");
    $result-> data_seek();
//$query1=mysql_query("insert into login values('','$username','$password')");
    $rows = mysqli_num_rows($query);
//$rows = mysql_num_rows($query1);
    if ($rows == 1) {
    $_SESSION['login_user']=$email; // Initializing Session
    header("location: signup.php"); // Redirecting To Other Page
    echo "hi";
    } else {
    $error = "Username or Password is invalid";
    }
    }
    }
?>
<!DOCTYPE html>
<html lang="en" class="bg-dark">
    <head>
        <meta charset="utf-8" />
        <title>Signin</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/animate.css" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="css/font.css" type="text/css" />
        <link rel="stylesheet" href="css/app.css" type="text/css" />
        <!--[if lt IE 9]>
          <script src="js/ie/html5shiv.js"></script>
          <script src="js/ie/respond.min.js"></script>
          <script src="js/ie/excanvas.js"></script>
        <![endif]-->
    </head>
    <body>
        <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
            <div class="container aside-xxl">
                <a class="navbar-brand block" href="index.html">Notebook</a>
                <section class="panel panel-default bg-white m-t-lg">
                    <header class="panel-heading text-center">
                        <strong>Sign in</strong>
                    </header>
                    <form action="index.html" class="panel-body wrapper-lg">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" id="email" placeholder="test@example.com" class="form-control input-lg">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" id="password" placeholder="Password" class="form-control input-lg">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"/> Keep me logged in
                            </label>
                        </div>
                        <a href="forgot_password.php" class="pull-right m-t-xs"><small>Forgot password?</small></a>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                        <div class="line line-dashed"></div>
                        <div class="line line-dashed"></div>
                        <p class="text-muted text-center"><small>Do not have an account?</small></p>
                        <a href="signup.html" class="btn btn-default btn-block">Create an account</a>
                    </form>
                </section>
            </div>
        </section>
        <!-- footer -->
        <footer id="footer">
            <div class="text-center padder">
                <p>
                    <small>Web app framework base on Bootstrap<br>&copy; 2013</small>
                </p>
            </div>
        </footer>
        <!-- / footer -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.js"></script>
        <!-- App -->
        <script src="js/app.js"></script>
        <script src="js/app.plugin.js"></script>
        <script src="js/slimscroll/jquery.slimscroll.min.js"></script>  
    </body>
</html>