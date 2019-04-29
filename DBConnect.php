<?php
    $servername = "us-cdbr-iron-east-02.cleardb.net";
    $username = "b50a31d36f7692";
    $password = "6e11321b";
    $dbname = "heroku_3034a28df9bfd1a";
    $port = "3306";
    
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    
    if($conn -> connect_error) {
        die("Connection ailed: " . $conn->connect_error);
    } 
?>
