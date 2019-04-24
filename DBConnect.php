<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "enterpriseproject";
    $port = "3306";
    
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    
    if($conn -> connect_error) {
        die("Connection ailed: " . $conn->connect_error);
    } 
?>
