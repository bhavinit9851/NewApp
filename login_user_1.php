<?php 
include("config_user.php");
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{    
    $user_email=$_POST['txtEmail'];
    $user_pass=$_POST['txtPassword'];   
    
    $check_user = "select * from user WHERE user_mail='$user_email' AND user_password='$user_pass'";
    
    $run = $conn -> query($check_user);    
    $row = $run -> fetch_assoc();    
    
    if($run -> num_rows > 0)
    {        
        header('Location: profile.php');
        $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.
    }   
    else
    {
        echo "<script>";
        echo "alert('user not exists')"; 
        echo "</script>";
    }    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/form-elements.css">
        <link rel="stylesheet" href="css/style.css">
       <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/iphone.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/iphone@2x.png">

    </head>

    <body style="background-image:url(images/2.jpg);">
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="">AGREE OR DISAGREE</a>
				</div>				
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>														
							<span class="li-social">
								<a href="#"><i class="fa fa-facebook"></i></a> 
								<a href="#"><i class="fa fa-twitter"></i></a> 
								<a href="#"><i class="fa fa-envelope"></i></a> 
								<a href="#"><i class="fa fa-skype"></i></a>                              
							</span>
						</li>
                                                <h2><a href="index.php">HOME</a></h2>
					</ul>
				</div>
			</div>
		</nav>        
        <div class="top-content">        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>AGREE OR DESGREE</strong> Login </h1>
                            <div class="description">
                            	<!--<p>
	                            	This is a free responsive registration form made with Bootstrap. 
	                            	Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
                            	</p>-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-6 phone">
                            <img src="images/iphone.png" alt=""/>
                    	</div>
                        <div class="col-sm-5 form-box1">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<center><h3>Log-In</h3></center>
                            		<p>Already Registered User Login Here : </p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form action="" method="post" class="registration-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-first-name">Email-Id</label>
			                        	<input type="email" name="txtEmail" placeholder="Email Address..." class="input-lg form-control" id="txtEmail" required=""/>
			                        </div>                                                
                                                <div class="form-group">
			                        	<label class="sr-only" for="form-last-name">Password</label>
			                        	<input type="password" name="txtPassword" placeholder="Password..." class="input-lg form-control" id="txtPassword" required=""/>
			                        </div>			                        
			                        <center><button type="submit" name="submit" class="btn">Login</button>
                                                <button class="btn">Cancel</button></center>
                                                <center><p class="">Do not have an account? </p></center> 
                                                <center><a href="signup_user.php" class="btn">Create an Account</a>
                                                </center>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <!-- Javascript -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/retina-1.1.0.min.js"></script>
        <script src="js/scripts.js"></script>        
        <script src="js/bootbox.min.js"></script>        
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>
</html>