<?php 
session_start();
//if(isset($_SESSION['email']))
//    {
//         header("Location:index.php"); //redirect to login page to secure the welcome page without login access.
//    }
?>
<?php
include("config.php");
if(isset($_POST['submit']))
{
    $user_email=$_POST['txtEmail'];
    $user_pass=$_POST['txtPassword'];    
    $check_user="select * from administrator WHERE username='$user_email' AND password='$user_pass'";
    $run=mysqli_query($conn,$check_user);
    $row=$run->fetch_assoc();
    if($run->num_rows >0)
    {
        $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.
        header('Location: index.php');        
        //$_SESSION['uid']=$row['user_id'];
    }   
    else
    {
        echo "<script>";
        echo "alert('user not exists')"; 
        echo "</script>";
    }
}
?>
<style>
    body
    {
        background-color: white; 
/*        background-image: url("images/Online-Dating-Guide-header.jpg");*/
/*        background-repeat: no-repeat;*/
    }
    
    </style>
<html lang="en" class="bg-dark">
    <head>
        <meta charset="utf-8" />
        <title>Bar-Buzz Login</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/animate.css" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="css/font.css" type="text/css" />
        <link rel="stylesheet" href="css/app.css" type="text/css" />        
    </head>
    <body style=" background: transparent url('../images/bar_back.jpg') no-repeat scroll 0% 0% / cover;">
        <section id="content" class="wrapper-md animated fadeInUp">    
            <div class="container aside-xxl">
                <div class="navbar-brand block block-login">
                   <h1 style="color:#F5F5F5;"> Bar Buzz </h1>
                </div>
                <section class="panel panel-default bg-white m-t-lg">                    
                    <form action="" class="panel-body wrapper-lg" method="post" enctype="multipart/form-data" id='commentForm'>
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" id="txtEmail" name="txtEmail" placeholder="admin" class="form-control input-lg" required=""/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" id="txtPassword" name="txtPassword" placeholder="Password" class="form-control input-lg" required=""/>
                        </div>                        
                                         <div class="checkbox">
                            <label>
                                <input type="checkbox"/> Keep me logged in
                            </label>
                        </div>
                       
                        <div class="line line-dashed"></div>
                        <div class="line line-dashed"></div>
                        
                        <button type="submit" name="submit" class="btn btn-primary btn-margin">Sign in</button>
                        <button class="btn btn-primary" style="margin-left: 70px;"> Cancel</button>                             
                        			
                    </form>
                </section>
            </div>
        </section>        
        <footer id="footer">            
            <div class="text-center padder">
                <p>
                    <h4 style="color:#F5F5F5">Bar Buzz &copy; 2015</h4>
                </p>
            </div>
        </footer>             
      <script type="text/javascript">
        function forgot_password() {
            alert("Password & Email-Id is Send to your Already Registered Email-Id");
        }              
        </script>
</html>