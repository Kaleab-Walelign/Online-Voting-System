<?php

$host = "localhost";
$user = "root";
$pass = "";
$db_name = "votter";


$connect = mysqli_connect($host,$user,$pass,$db_name);


$host2 = "localhost";
$user2 = "root";
$pass2 = "";
$db_name2 = "woreda";

$connect2 = mysqli_connect($host2,$user2,$pass2,$db_name2)
//if($connect){
    //echo"Data Base Connect Success Fully";
//}
//else{
    //echo "Connection Problem ". mysqli_connect_error();
    
//}


?>