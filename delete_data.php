<?php
    include('dbConfig.php');
    error_reporting(0);
    $data_id = $_GET['did'];
    $query6 = "delete from user_data where data_id='$data_id'";
    $data = mysqli_query($conn,$query6);
    if($data){
        // echo "";
    }
?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=dashboard.php">
  