<?php
    include('dbConfig.php');
    // error_reporting(0);
    $data_id = $_GET['did'];
    $query7 = "update user_data set status='paid' where data_id='$data_id'";
    $data = mysqli_query($conn,$query7);
    if($data){
        // echo "";
    }
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=dashboard.php">
  