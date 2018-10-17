<?php 


	include "config.php";
	
    if (isset($_GET['Sensor']) ){
     
    
        $Sen = $_GET['Sensor'];
		
		
		$sql =  "UPDATE device_status SET status = '".$Sen."'  WHERE device_id = 1";
			
	        

            $result = mysqli_query($con, $sql );
            if($result)
            {
                echo "data inserted successfully";
            } else {

                echo "wrong ! " + mysqli_error($result)	;
            }

    } else {
    	echo "No request to handle!! ";
    }
?>