<?php
	include("config.php");
	$filename="excel-".date('Y-m-d').".xls";
	
	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Type: application/vnd.ms-exel");
        
        $email = $_GET['excel'];
        
        $res = $conn->query("select * from bar_registration where ");
        
        echo "Bar Name \t Bar Email \t Bar Contact Number \t Bar Address \t Bar Likes \t Bar City \t Bar Short Description \r\n";
         while($row = mysqli_fetch_assoc($res)) {    
                                
                                echo $row['bar_name']."\t"; 
                                echo $row['bar_email']."\t"; 
                                echo $row['bar_contact']."\t"; 
                                echo $row['bar_address']."\t";
                                 echo $row['like_bar']."\t";
                                  echo $row['bar_city']."\t";
                                   echo $row['bar_short_desc']."\t";
                                 
                                echo "\r\n";    
          }
?>