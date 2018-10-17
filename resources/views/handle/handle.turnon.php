<?php 

include "config.php";
if(isset($_GET['alarm'])){
	$alarm = $_GET['alarm'];
	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"192.168.100.3/$alarm");
		curl_setopt($ch, CURLOPT_POST, 1);
		

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


		$server_output = curl_exec ($ch);
		curl_close ($ch);
        print $server_output;
		
		if($alarm != "off"){
			$Sen = "on";
			$sql3 =  "UPDATE device_status SET status = '".$Sen."'  WHERE device_id = 5";
			$result3 = mysqli_query($con, $sql3 );
            if($result3)
            {
                echo "data updated successfully";
            } else {

                echo "wrong ! " + mysqli_error($result3)	;
            }
		}else {
			$Sen = "off";
			$sql3 =  "UPDATE device_status SET status = '".$Sen."'  WHERE device_id = 5";
			$result3 = mysqli_query($con, $sql3 );
            if($result3)
            {
                echo "data updated successfully";
            } else {

                echo "wrong ! " + mysqli_error($result3)	;
            }
		}

header("location:http://127.0.0.1:8000/sensors-details");	
	
}

?>