<?php


include 'dbcon.php';

$id = $_POST['id'];

$query = "DELETE FROM user_master WHERE userid='" . $id . "'"; 

$res = mysqli_query($condb, $query);

if($res) {

 echo json_encode($res);

} else {

 echo "Error: " . $sql . "" . mysqli_error($condb);

}


?>