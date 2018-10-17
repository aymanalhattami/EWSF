<?php 


	include "config.php";
	
    if (isset($_GET['arduino1']) ){
     
    
        $Ard1 = $_GET['arduino1'];
		$Ard2 = $Ard1 + 2;
		$average = ($Ard1 + $Ard2)/2;
		$Sen = "";
			if($Ard1 < 0 ){
				$Ard1 = 0;
				$Ard2 = 0;
				
			}
	        $sql =  "INSERT INTO arduinos(arduino_1, arduino_2,mean)   VALUES ('$Ard1', '$Ard2','$average')";
			$sql2 =  "INSERT INTO past_arduinos(arduino_1, arduino_2,mean)   VALUES ('$Ard1', '$Ard2','$average')";

            
			$result2 = mysqli_query($con, $sql2 );
            if($result2)
            {
                echo "data inserted successfully";
            } else {

                echo "wrong ! " + mysqli_error($result2)	;
            }
			
			$result = mysqli_query($con, $sql );
            if($result)
            {
                echo "data inserted successfully";
            } else {

                echo "wrong ! " + mysqli_error($result)	;
            }

			
		$replay = "";
      
         if ($Ard1 > 0 && $Ard1 <= 5){
			 $Sen = "on";
             $replay = "one";
         } else if($Ard1 > 5 && $Ard1 <=  10){
             $Sen = "on";
			 $replay = "two";
         }else if($Ard1 > 10){
             $Sen = "on";
			 $replay = "three";
         } else if ($Ard1 ==  0){
             $Sen = "off";
			 $replay = "off";
         }else {
			 echo "Error";
		 }


		
			 $sql3 =  "UPDATE device_status SET status = '".$Sen."'  WHERE device_id = 5";
			$result3 = mysqli_query($con, $sql3 );
            if($result3)
            {
                echo "data updated successfully";
            } else {

                echo "wrong ! " + mysqli_error($result3)	;
            }

    	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"192.168.100.3/$replay");
		curl_setopt($ch, CURLOPT_POST, 1);
		

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


		$server_output = curl_exec ($ch);
		curl_close ($ch);
        print $server_output;



    } else {
    	echo "No request to handle!! ";
    }
?>