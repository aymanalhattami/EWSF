<h1>test</h1>
<?php
/*if(isset($_GET["arduino1"]))
{
    $ard1 = $_GET["arduino1"];
    $ard2 = $_GET["arduino1"];

    @define('DBHOST', 'localhost');
    @define('DBUSER', 'root');
    @define('DBPASS', '');
    @define('DBNAME', 'ewsf');

    $con = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME)or die("Error connect");
    mysqli_query($con, "SET NAMES UTF8");
    mysqli_query($con, "SET CHARACTER SET UTF8");


    $sql =  "INSERT INTO arduinos   VALUES ('$ard1', '$ard2')";

    $result = mysqli_query($con , $sql );
    if($result)
    {
        echo "data inserted successfully";
    }

}*/

echo $_GET["ar"];

/*$ard1 = "aymen-mohammed";
$ard2 = "alhattamy";

@define('DBHOST', 'localhost');
@define('DBUSER', 'root');
@define('DBPASS', '');
@define('DBNAME', 'ewsf');

$con = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME)or die("Error connect");
mysqli_query($con, "SET NAMES UTF8");
mysqli_query($con, "SET CHARACTER SET UTF8");


$sql =  "INSERT INTO arduinos(arduino_1, arduino_2)  VALUES ('$ard1', '$ard2')";

$result = mysqli_query($con , $sql );
echo $result;*/
?>