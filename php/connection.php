<?php
    $servername = "localhost";
    //$username = "theblack_mehedi";
    //$password = "28465379005@Mh";
    //$dbname = "theblack_bs_hotel";
    $username = "root";
    $password = "";
    $dbname = "bs_hotel";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }
   //echo "Connected successfully";

?>