<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "admindb";
    $dbname = "sistema_unico1";

    $connection = new mysqli($servername, $username, $password, $dbname);
    
    if($connection -> connect_error)
        die("Connection failed: " . $connection -> connect_error);
    
?>

