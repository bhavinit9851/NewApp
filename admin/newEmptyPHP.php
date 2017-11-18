<?php 
include("header.php"); 
include("config.php");      
if($_SERVER['REQUEST_METHOD'] =="GET")
{
  $delId = $_GET['delete'];
  $editId = $_GET['edit'];
  if(isset($delId))
  {
    $conn -> query("delete from bar_registration where id='$delId'");
  }
  if(isset($editId))
  {
    $res1 = $conn->query("select * from bar_registration where id='$editId'");                         
    $row = $res1->fetch_assoc();          
    $barname = $row['bar_name'];
    $baremail = $row['bar_email'];
    $barcontact = $row['bar_contact'];
    $baraddress = $row['bar_address'];
    $barcity = $row['bar_city'];
    $barshortdesc = $row['bar_short_desc'];  
    $barimage = $row['bar_photo'];   
    $files = $_FILES['image']['tmp_name'];
    $target = "uploads/";
    $target1 = $target . basename( $_FILES['image']['name']);
    $Filename = basename( $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$target1);
  }
}

if(isset($_POST) && !empty($_POST) && isset($_FILES['image']['name']))
{
  if(isset($_GET['edit']))
  {
    if($_FILES['image']['tmp_name'] != null)
    {
      $files = $_FILES['image']['tmp_name'];
      $target = "uploads/";
      $target1 = $target . basename( $_FILES['image']['name']);
      $Filename = basename( $_FILES['image']['name']);
           // echo "$Filename";
      move_uploaded_file($_FILES['image']['tmp_name'],$target1);
    }       
    $firstname = trim($_POST["txtName"]);
    $email = trim($_POST["txtEmail"]);
    $contactnumber = trim($_POST["txtContactNumber"]);
    $address = trim($_POST["txtAddress"]);
    $city = trim($_POST["txtCity"]);    
    $short_details = trim($_POST["txtShortDetails"]);

    $string=time();
    $string=md5($string);
    if($Filename != null)
    {
      echo $Filename;
      $query2 ="update bar_registration set bar_photo='$Filename',bar_name='$firstname',bar_email='$email',bar_contact='$contactnumber',bar_address='$address',bar_city='$city',bar_short_desc='$short_details' where id='".$_GET['edit']."'";

    }
    else
    {
      $query2 ="update bar_registration set bar_name='$firstname',bar_email='$email',bar_contact='$contactnumber',bar_address='$address',bar_city='$city',bar_short_desc='$short_details' where id='".$_GET['edit']."'";
    }
    $conn->query($query2);
    $ok =  "<div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <center> <strong>  Succesfully Updated...!!! </strong> </center>
    </div>";

            // }

        // echo "Updation is in process...!!!!!!";
        // $query2 ="update bar_registration set bar_photo='$files',bar_name='$firstname',bar_email='$email',bar_contact='$contactnumber',bar_address='$address',bar_city='$city',bar_short_desc='$short_details' where id='".$_GET['edit']."'";
        // $conn->query($query2);

        // $ok =  "<div class='alert alert-warning'>
        //         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        // <strong>  Succesfully Updated...!!! </strong>
        // </div>";
  }
  else
  {
    $files = $_FILES['image']['tmp_name'];
    $target = "uploads/";
    $target1 = $target . basename( $_FILES['image']['name']);
    $Filename=basename( $_FILES['image']['name']);

    move_uploaded_file($_FILES['image']['tmp_name'], $target1);

    $firstname = trim($_POST["txtName"]);
    $email = trim($_POST["txtEmail"]);
    $contactnumber = trim($_POST["txtContactNumber"]);
    $address = trim($_POST["txtAddress"]);
    $city = trim($_POST["txtCity"]);    
    $short_details = trim($_POST["txtShortDetails"]);
    $string=time();
    $string=md5($string);

                    //Tells you if its all ok
                    //echo "The file ". basename( $_FILES['image']['name']). " has been uploaded, and your information has been added to the directory";

    $query1 = "insert into bar_registration (unique_id,bar_photo,bar_name,bar_email,bar_contact,bar_address,bar_city,bar_short_desc) values ('$string','$Filename','$firstname','$email','$contactnumber','$address','$city','$short_details')";    
    $conn -> query($query1);    

    $ok =  "<div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <center> <strong> Succesfully inserted...!!! </strong> </center>
    </div>";
  }
}
?>
<section id="content">
  <section class="vbox">          
    <section class="scrollable padder">            
      <div class="m-b-md">
        <center><h2 class="m-b-none">Manage Bars</h2></center>
        <center><h4 class="m-b-none">(Note: Admin Can Add new Bars by filling whole details in the Below Form.)</h4></center>
      </div>

      <div class="row">
        <!-- <div class="col-sm-6"> -->
        <form action="" data-validate="parsley" method="post" id='commentForm' enctype='multipart/form-data'>
          <section class="panel panel-default">
            <header class="panel-heading">
              <!-- <span class="h4">Registration</span> -->
            </header>
            <div class="panel-body">            

             <center> <h4 class="text-muted">(Note: Please fill the information to continue)</h4></center>
             <div class="col-sm-6">
              <div class="form-group">                            
                <label>Name</label>
                <input type="text"
                value="<?php if(isset($editId))
                {
                 echo $barname;
               }?>"
               placeholder="eg. Name of Your Bar" name="txtName" maxlength="20" id="txtName" class="form-control" required=""/>
             </div>
             <div class="form-group">                            
              <label>Email Address</label>
              <input type="email"
              value="<?php if(isset($editId))
              {
               echo $baremail;
             }?>"
             placeholder="" name="txtEmail" maxlength="50" id="txtEmail" class="form-control" required=""/>
           </div>
           <div class="form-group">
            <label for="image">Photo of Your bar</label>
            <input type="file" id="image" class="form-control" name="image" >
            <?php echo htmlspecialchars($not_Contenido);
            if(isset($editId))
            {
             echo "$barimage";
           }
           ?>
         </input>
       </div>
       <div class="form-group">
        <label>Contact Number</label>
        <input type="text" name="txtContactNumber" 
        value="<?php if(isset($editId))
        {
         echo $barcontact;
       }?>"
       id="txtContactNumber" maxlength="15" class="form-control" required=""/>   
     </div>
   </div>
   <div class="col-sm-6">

    <div class="form-group">
      <label>Address</label>
      <input type="text" name="txtAddress"  
      value="<?php if(isset($editId))
      {
       echo $baraddress;
     }?>"
     id="txtAddress" class="form-control" maxlength="100" required="" />
   </div>
   <div class="form-group">
    <label>City</label>
    <input type="text" name="txtCity" 
    value="<?php if(isset($editId))
    {
     echo $barcity;
   }?>"
   id="txtCity" maxlength="15" class="form-control" required=""/>
 </div>
 <div class="form-group">
  <label>Short Details</label>
  <textarea class="form-control" id="txtShortDetails" cols="66" rows="6" name="txtShortDetails"                                    
  placeholder="eg. Details about your Bar"><?php echo htmlspecialchars($not_Contenido);
  if(isset($editId))
  {
    echo "$barshortdesc";
  }
  ?></textarea>
</div>
</div>
</div>
<?php if(isset($ok))
{
  echo $ok;
}
?>  
<footer class="panel-footer text-right bg-light lter">
  <button type="submit"  value="submit" class="btn btn-success btn-s-xs">Submit</button>                                                               
  <a href="#mycancel" data-toggle='modal' class="btn btn-success btn-s-xs" style="margin-RIGHT: 725PX;" name="cancel">Cancel</a>                                
</footer>
</section>
</form>                        
<!-- </div>            -->
</div>
<section class="panel panel-default">
  <header class="panel-heading">                                  
      <button type="submit" class="btn btn-success btn-s-xs" onclick="window.open('exportexcel.php?excel')">Export in ExcelSheet</button>
  </header>               
  <div class="adv-table">                 
    <table class="display table table-bordered table-striped" id="example" >
      <thead>
        <tr>
          <th width="10%">Photo(Bar)</th> 
          <th width="10%">Name(Bar)</th> 
          <th width="10%">Email Address</th>
          <th width="20%">Contact Number</th>
          <th width="20%">Address</th>
          <th width="15%">Total No. of Likes</th>
          <th width="10%">City</th>
          <th width="40%">Short Description</th>   

          <th width="20%"></th>                                
          <th width="20%"></th>                                
        </tr>
      </thead>
      <?php        
      $res = $conn->query("select * from bar_registration");                            
                        // $path = "uploads";
                        // $dir_handle = @opendir($path) or die("Unable to open folder");

      while($row = mysqli_fetch_assoc($res)) {
       ?>
       <tr class='gradeA'> 
        <!-- <td><img src='../uploads/{$row['bar_photo']}'/></td> -->
        <td><img style="width:100px;height:100px;" src="uploads/<?php echo $row['bar_photo']; ?>"></td>
        <td><?php echo $row['bar_name']; ?></td>
        <td><?php echo $row['bar_email']; ?></td>
        <td><?php echo $row['bar_contact']; ?></td>
        <td><?php echo $row['bar_address']; ?></td>
        <td><?php echo $row['like_bar']; ?></td>
        <td><?php echo $row['bar_city']; ?></td>
        <td><?php echo $row['bar_short_desc']; ?></td> 
        <td><a href='manage_bar.php?edit=<?php echo $row['id']; ?>'><img src ="images/edit_new.png"/></a></td>
        <td><a href='manage_bar.php?delete=<?php echo $row['id']; ?>'><img src ="images/delete_new.png"/></a></td>
      </tr>      
      <?php
    }
    ?>
  </table>
</div>                
</section>
</section>
</section>    
</section>
<aside class="bg-light lter b-l aside-md hide" id="notes">
  <div class="wrapper">Notification</div>
</aside>
<?php include("footer.php"); ?>