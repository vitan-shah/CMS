<?php
include 'connection.php';
$qty=$_POST['quantity'];
$cid=$_POST['category'];
$del=$_POST['del'];
$cal=0;
$qry="select * from product_master where pid=$cid";
$res=mysqli_query($con,$qry);
while($row=mysqli_fetch_array($res))
{

    if($del=='N')
    {
        $cal=$qty*$row['land_price'];
    }
    else {
        $cal=$qty*$row['air_price'];
    }
}
 
echo json_encode(array("price"=>$cal));
?>