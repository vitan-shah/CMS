<?php

if(count($_POST)>0)
{    
     include 'dbcon.php';
     
     $cname = $_POST['cname'];
     

     if(empty($_POST['cityId'])){
 
      $query = "INSERT INTO city_master (cityname)  VALUES ('$cname')"; // insert data into database

     }else{
       $query = "UPDATE city_master set cityid='" . $_POST['cityId'] . "', cityname='" . $_POST['cname'] . "' WHERE cityid='" . $_POST['cityId'] . "'"; // update form data from the database
     }

    $res = mysqli_query($condb, $query);

    if($res) {

     echo json_encode($res);

    } else {

     echo "Error: " . $sql . "" . mysqli_error($condb);

    }

}

?>