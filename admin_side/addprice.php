<?php

if(count($_POST)>0)
{    
     include 'dbcon.php';
     
     $tcity = $_POST['tocity'];
     $fcity = $_POST['fromcity'];
     $nprice=$_POST['nprice'];
     $eprice=$_POST['eprice'];

    //  echo $_POST['priceId'];
     if(empty($_POST['priceId'])){
      $query = "INSERT INTO price_master (to_cityid,from_cityid,normal_price,express_price)  VALUES ('$tcity','$fcity','$nprice','$eprice')"; // insert data into database
     }else{
       $query = "UPDATE price_master set prid='" . $_POST['priceId'] . "', to_cityid='" . $_POST['tocity'] . "',from_cityid='".$_POST['fromcity']."',normal_price='" . $_POST['nprice'] . "',express_price='" . $_POST['eprice'] . "' WHERE prid='" . $_POST['priceId'] . "'"; // update form data from the database
     }
    $res = mysqli_query($condb, $query);
    if($res) {

     echo json_encode($res);

    } else {

     echo "Error: " . $sql . "" . mysqli_error($condb);

    }

}
