<?php
    $servername = "sql109.infinityfree.com";
    $username = "if0_37369949";
    $password = "fNnGsJt4ec";
    $database = "if0_37369949_ksk";

    // Create connection
    $con = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 

    // Set character encoding
    $con->query("SET character_set_results=utf8mb4");
    mb_language('uni'); 
    mb_internal_encoding('UTF-8');
    $con->query("SET NAMES utf8mb4");
    $con->set_charset('utf8mb4');

?>
