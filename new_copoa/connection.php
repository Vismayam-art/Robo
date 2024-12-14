<?php 
    $servername = "localhost";
    $email = "root";
    $password = "";
    $db_name = "copoa";  
    $conn = new mysqli($servername, $email, $password, $db_name, 3306);
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo "";
?>