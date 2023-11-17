<?php 
    session_start();
    $dbHost     = "localhost"; 
    $dbUsername = "root"; 
    $dbPassword = ""; 
    $dbName     = "expense_tracker"; 
    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
    if ($conn) { 
        // echo "success";
    }
    else{
        echo "failed.";
    }
?>