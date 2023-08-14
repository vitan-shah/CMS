<?php
    include "dbcon.php";
 
    $id = $_POST['id'];

    $query="SELECT * from city_master WHERE cityid = '" . $id . "'";

    $result = mysqli_query($condb,$query);

    $cust = mysqli_fetch_array($result);

    if($cust) {

     echo json_encode($cust);

    } else {

     echo "Error: " . $sql . "" . mysqli_error($condb);

    }
 
?>