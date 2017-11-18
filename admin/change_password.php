<?php include("header.php");
      include("config.php");
    ?>
<?php        
        if($_SERVER['REQUEST_METHOD'] =="POST")
        {
            $pass = $_POST['txtCurrentPassword'];             
            $res = $conn->query("select * from administrator where password='$pass'");
            if($res->num_rows>0)
            {                  
                   $Cpassword = $_POST['txtCurrentPassword'];
                   $newpassword = $_POST['txtNewPassword'];
                   $confirmnewpassword = $_POST['txtRePassword'];             
                   $conn->query("UPDATE administrator SET password='$newpassword'");
            }
        }
 ?>

<section id="content">
    <section class="vbox">          
        <section class="scrollable padder">            
            <div class="m-b-md">
                <h3 class="m-b-none"></h3>               
            </div>
            <section class="panel panel-default">               
            </section>
            <div class="row">
                <div class="col-sm-6">
                    <form method="post">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <span class="h4">Change Password</span>
                            </header>
                            <div class="panel-body">                                
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" id="txtCurrentPassword" name="txtCurrentPassword" class="form-control" required=""/>                        
                                </div>
                                <div class="form-group pull-in clearfix">
                                    <div class="col-sm-6">
                                        <label>New Password</label>
                                        <input type="password" id="txtNewPassword" name="txtNewPassword" class="form-control" required=""/>   
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Re-type New Password</label>
                                        <input type="password" id="txtRePassword" name="txtRePassword" class="form-control" required=""/>      
                                    </div>   
                                </div>
                            </div>                            
                            <footer class="panel-footer text-right bg-light lter">
                                <button type="submit" class="btn btn-success btn-s-xs" onclick="return myFunction();">Submit</button>
                            </footer>
                        </section>
                    </form>    
                </div>
            </div>             
        </section>
    </section>
    
</section>
<aside class="bg-light lter b-l aside-md hide" id="notes">
    <div class="wrapper">Notification</div>
</aside>

<?php include("footer.php"); ?>
