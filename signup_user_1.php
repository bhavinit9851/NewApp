<?php
include("config_user.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{              			    
    $firstname = trim($_POST["txtFirstName"]);
    $lastname = trim($_POST["txtLastName"]);
    $email = trim($_POST["txtEmail"]);
    $contact = trim($_POST["txtContactNumber"]);    
    $city = trim($_POST["txtCity"]);    
    $password = trim($_POST["txtPassword"]);
    $cpassword = trim($_POST["txtCPassword"]);
    
    $q1 = "select * from user where user_mail = '$email'";
    $res = $conn->query($q1);
  
    if ($password != $cpassword){
                    
        echo '<script language="javascript">';
        echo 'alert("Password does not match")';
        echo '</script>';
        //echo "Password does not match";
        }       
    else if(mysqli_num_rows($res) > 0)
    {
      echo '<script language="javascript">';
      echo 'alert("Email already Exists..!")';      
      echo '</script>';
    }
    else
    {
        $query1 = "insert into user (user_fname,user_lname,user_mail,user_contact_no,user_city,user_password) values ('".$firstname."','".$lastname."','".$email."','".$contact."','".$city."','".$password."')";    
        
        if($conn -> query($query1) === true)
        {
            header('Location: index.php');        
        }
        else
        {
            echo "error";
        }
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
        <link rel="stylesheet" href="css/main1.css">
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/iphone.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/iphone@2x.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/">
        <link rel="apple-touch-icon-precomposed" href="images/">
        
    </head>
    
    <body style="background-image:url(images/2.jpg);">
        <!-- Top menu -->
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
                <!-- Collect the nav links, forms, and other content for toggling -->
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
                            <h1><strong>AGREE OR DESGREE</strong> Registration Form</h1>
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
                            <img src="images/iphone.png" alt="">
                        </div>
                        <div class="col-sm-5 form-box1">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Register</h3>
                                    <p>Fill in the form below to get instant access:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form method="post" class="registration-form">
                                    <div class="form-group">
<!--                                        <label class="sr-only" for="form-first-name">First name</label>-->
                                        <input type="text" name="txtFirstName" placeholder="First name..." class="input-lg form-control" id="txtFirstName" required=""/>
                                    </div>
                                    <div class="form-group">
<!--                                        <label class="sr-only" for="form-first-name">Last name</label>-->
                                        <input type="text" name="txtLastName" placeholder="Last name..." class="form-first-name form-control" id="txtLastName" required=""/>
                                    </div>
                                    <div class="form-group">
<!--                                        <label class="sr-only" for="form-first-name">EMail Address</label>-->
                                        <input type="email" name="txtEmail" placeholder="Email-Id..." class="input-lg form-control" id="txtEmail" required=""/>
                                    </div>
                                    <div class="form-group">
<!--                                        <label class="sr-only" for="form-first-name">Contact Number</label>-->
<input type="text" name="txtContactNumber" placeholder="Contact Number..." class="form-first-name form-control" id="txtContactNumber" required="" maxlength="15"/>
                                    </div>
                                    <div class="form-group">
<!--                                        <label class="sr-only" for="form-first-name">City</label>-->
                                        <input type="text" name="txtCity" placeholder="City..." class="form-first-name form-control" id="txtCity" required=""/>
                                    </div>
                                    <div class="form-group">
<!--                                        <label class="sr-only" for="form-last-name">Password</label>-->
                                        <input type="password" name="txtPassword" placeholder="Password..." class="input-lg form-control" id="txtPassword" required=""/>
                                    </div>
                                    <div class="form-group">
<!--                                        <label class="sr-only" for="form-email">Confirm Password</label>-->
                                        <input type="password" name="txtCPassword" placeholder="Confirm Password..." class="input-lg form-control" id="txtCPassword" required=""/>
                                    </div>
                                    <button type="submit" name="submit" class="btn">Sign me up!</button>
                                    <a href="login_user.php" style="margin-left:190px;">
                                        <button class="btn">Login</button>
                                    </a>
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
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->        
    </body>    
</html>