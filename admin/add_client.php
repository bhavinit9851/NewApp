<?php include("header.php"); ?>
<?php
include("config.php");

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST))
{           			    
    $firstname = trim($_POST["txtName"]);
    $email = trim($_POST["txtEmail"]);
    $contactnumber = trim($_POST["txtContactNumber"]);
    $address = trim($_POST["txtAddress"]);
    $city = trim($_POST["txtCity"]);    
    $short_details = trim($_POST["txtShortDetails"]);
    $string=time();
    $string=md5($string);
    
    $query1 = "insert into bar_registration (unique_id,bar_name,bar_email,bar_contact,bar_address,bar_city,bar_short_desc) values ('$string','$firstname','$email','$contactnumber','$address','$city','$short_details')";    
    $conn -> query($query1);
    
    header('Location: index.php');        
}
?>
<section id="content">
    <section class="vbox">                
        <section class="scrollable padder">            
            <div class="m-b-md">
                <center><h2 class="m-b-none">Add Bar</h2></center>
            </div>            
             <section class="panel panel-default">               
            </section>
            <?php                  
                //$res1=$conn->query("select * from mst_user where user_id='".$_SESSION['uid']."'");
                //$row1=$res1->fetch_assoc();              
             ?>
            <div class="row">
                <div class="col-sm-6">
                    <form action="" data-validate="parsley" method="post" id='commentForm'>
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <span class="h4">Registration</span>
                            </header>
                            <div class="panel-body">                                
                                <p class="text-muted">Please fill the information to continue</p>
                                <div class="form-group">                            
                                    <label>Name</label>
                                    <input type="text" placeholder="eg. Name of Your Bar" name="txtName" maxlength="20" id="txtName" class="form-control" required=""/>
                                </div>
                                <div class="form-group">                            
                                    <label>Email Address</label>
                                    <input type="email" placeholder="" name="txtEmail" maxlength="50" id="txtEmail" class="form-control" required=""/>
                                </div>
                                <div class="form-group">
                                      <label for="exampleInputFile">Photo of Your bar</label>
                                      <input type="file" id="exampleInputFile"  class="form-control" required=""/>
                                  </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="txtContactNumber" id="txtContactNumber" maxlength="15" class="form-control" required=""/>   
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="txtAddress"  id="txtAddress" class="form-control" maxlength="100" required="" />
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="txtCity" id="txtCity" maxlength="15" class="form-control" required=""/>
                                </div>
                                <div class="form-group">
                                    <label>Short Details</label>
                                              <textarea class="form-control" id="txtShortDetails" name="txtShortDetails" placeholder="eg. Details about your Bar" cols="60" rows="5"></textarea>
                                </div>
                             </div>                            
                            <footer class="panel-footer text-right bg-light lter">
                                <button type="submit"  value="submit" class="btn btn-success btn-s-xs">Submit</button>                                                               
                                <a href="#mycancel" data-toggle='modal' class="btn btn-success btn-s-xs" name="cancel">Cancel</a>                                
                            </footer>
                        </section>
                    </form>                        
                </div>           
            </div>
        </section>
    </section>    
</section>

<?php include("footer.php"); ?>


