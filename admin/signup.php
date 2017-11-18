<?php session_start(); ?>
<?php
include("config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST')
{           
    $firstname = trim($_POST["txtFirstName"]);
    $lastname = trim($_POST["txtLastName"]);
    $email = trim($_POST["txtEmail"]);
    $city = trim($_POST["txtCity"]);
    $mobile = trim($_POST["txtMobile"]);
    $password = trim($_POST["txtPassword"]);
    $confirmpassword = trim($_POST['txtConfirmPassword']);
    
    $q1 = "select * from admin_signup where email = '$email'";
    $res = $conn->query($q1);
     
    if ($password != $confirmpassword){                
        echo '<script language="javascript">';
        echo 'alert("Password does not match")';
        echo '</script>';        
    }       
    else if(mysqli_num_rows($res) > 0)
    {
      echo '<script language="javascript">';
      echo 'alert("Email already Exists..!")';      
      echo '</script>';  
    }
    else
    {       
        $query1 = "insert into admin_signup (fname,lname,email,city,mobile,password) values ('$firstname','$lastname','$email','$city','$mobile','$password')";

    if($conn->query($query1) === True)
    {        
        //mail code Start
        $to = $email;
        $subject = 'Email Verification';
        
        $message = '
                    <html>
                    <head>
                      <title>Email Verification </title>
                    </head>
                    <body>
                      
                      <table>
                        <tr>
                            Your Email-Id Is : '.$email.';
                        </tr>
                        <tr>
                             Your Password Is: '.$password.';
                        </tr>
                        <tr>
                          
                        </tr>
                      </table>
                    </body>
                    </html>
                            ';
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
     //   $headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
        $headers .= 'From: iWayTrack  ' . "\r\n";
      //  $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
      //  $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
        
       mail($to,$subject,$message,$headers);     
        
       // print_r($MailDetails);
        
        //Mail code End
        //echo '<script language="javascript">';
        //echo 'alert("Registered Successfully...!")';
        //echo '</script>';
       
         header('Location: login.php'); 
   //     echo "Registered Successfully...!";
    }
    else
    {
        echo '<script language="javascript">';
        echo 'alert("Error in Registration...!")';
        echo '</script>';
        
         header('Location: login.php'); 
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="bg-dark">
    <head>
        <meta charset="utf-8" />
        <title>Registration</title>
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
    <body class="login-body">
        <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
            <div class="container aside-xxl">
                <a class="navbar-brand block" href="signup.php">Registration</a>
                <section class="panel panel-default m-t-lg bg-white">
                    <header class="panel-heading text-center">
                        <strong>Sign up</strong>
                    </header>
                    <form action="" class="panel-body wrapper-lg" method="post" id='commentForm'>
                        <div class="form-group">
                            <label class="control-label">First Name</label>
                            <input type="text" name="txtFirstName" id="txtFirstName" placeholder="Your FirstName" class="form-control input-lg" required=""/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" name="txtLastName" placeholder="Your LastName" class="form-control input-lg" required=""/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email-Id</label>
                            <input type="email" name="txtEmail" id="txtEmail" placeholder="test@example.com" class="form-control input-lg" required=""/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">City</label>
                            <input type="text" name="txtCity" id="txtCity" placeholder="Your City" class="form-control input-lg" required=""/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mobile Number</label>
                            <input type="text" id="txtMobile" name="txtMobile" onkeypress="return isNumberKey(event)" placeholder="Mobile Number" class="form-control input-lg" required=""/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" id="txtPassword" name="txtPassword" placeholder="Type a password" class="form-control input-lg" required=""/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Confirm Password</label>
                            <input type="password" id="txtConfirmPassword" name="txtConfirmPassword" placeholder="Re-Type a password" class="form-control input-lg" required="" />
                        </div>
                        <button type="submit" class="btn btn-primary  btn-margin-signup">Submit</button>
                        
                        <a href="login.php" class="btn btn-primary" >Cancel</button></a>
                        <div class="line line-dashed"></div>
                        <a href="login.php" class="btn btn-default btn-block">Sign in</a>
                    </form>
                </section>
            </div>
        </section>
        <!-- footer -->
        <footer id="footer">
            <div class="text-center padder clearfix">
                <p>
                    <small>Dating &copy; 2015</small>
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
        <script type="text/javascript" charset="utf-8">
    function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

                return true;
            }
</script>
    </body>
</html>