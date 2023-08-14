<?php

if(count($_POST)>0)
{    
     include 'dbcon.php';
     
     $pname = $_POST['pname'];
     $desc = $_POST['desc'];

     if(empty($_POST['productId'])){
 
      $query = "INSERT INTO product_master (product_type, description)  VALUES ('$pname','$desc')"; // insert data into database

     }else{
       $query = "UPDATE product_master set pid='" . $_POST['productId'] . "', product_type='" . $_POST['pname'] . "',description='".$_POST['desc']."' WHERE pid='" . $_POST['productId'] . "'"; // update form data from the database
     }

    $res = mysqli_query($condb, $query);

    if($res) {

     echo json_encode($res);

    } else {

     echo "Error: " . $sql . "" . mysqli_error($condb);

    }

}

?>