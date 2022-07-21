<?php

header('Access-Control-Allow-Origin: *');

    $host="localhost";
    $user="root";
    $password="";
    $dbName="pizzaria";

    $connection = new mysqli($host, $user, $password, $dbName);
    
    if(!$connection){
        die("Connection failed: ".mysqli_connect_error());
    }
    
?>