<?php include("header.php");
include("config.php");          
?>

<section id="content">
    <section class="vbox">          
        <section class="scrollable padder">            
            <div class="m-b-md">
                <center><h2 class="m-b-none">Manage Bars</h2></center>
            </div>
            <section class="panel panel-default">               
            </section>
             
            <section class="panel panel-default">
                <header class="panel-heading">
                    <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>               
                    <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example" >
                            <thead>
                                <tr>
                                    <th width="10%">Name(Bar)</th> 
                                    <th width="10%">Email Address</th>
                                    <th width="20%">Contact Number</th>
                                    <th width="20%">Address</th>
                                    <th width="15%">City</th>
                                    <th width="40%">Short Description</th>                                
                                    <th width="20%"></th>                                
                                    <th width="20%"></th>                                
                                </tr>
                            </thead>
                        <?php        
                            $res = $conn->query("select * from bar_registration");                            
                            while($row = mysqli_fetch_assoc($res))
                            {
                        ?>
                            <tr class='gradeA'> 
                                <td><?php echo $row['bar_name']; ?></td>
                                <td><?php echo $row['bar_email']; ?></td>
                                <td><?php echo $row['bar_contact']; ?></td>
                                <td><?php echo $row['bar_address']; ?></td>
                                <td><?php echo $row['bar_city']; ?></td>
                                <td><?php echo $row['bar_short_desc']; ?></td> 
                                
                                <td><a href='manage_user.php?edit=<?php echo $row['device_id']; ?>'><img src ="images/edit_new.png"/></a></td>
            			<td><a href='manager_user.php?delete=<?php echo $row['device_id']; ?>'><img src ="images/delete_new.png"/></a></td>
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


