<?php 


	include "config.php";
	
    if (isset($_GET['Test']) ){
     
        $replay = "test";
		$status = "";
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"192.168.100.3/$replay");
		curl_setopt($ch, CURLOPT_POST, 1);
		

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


		$server_output = curl_exec ($ch);
		curl_close ($ch);
        print $server_output;
		
		
		
		if ($server_output == "ok"){
			$status = "on";
			$sql =  "UPDATE device_status SET status = '".$status."'  WHERE device_id = 4";
		}else {
			$status = "off";
			$sql =  "UPDATE device_status SET status = '".$status."'  WHERE device_id = 4";
		}
		
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