<?php

$to_email="vmshah2604@gmail.com";
$subject="Email Verification Mail";
$body="Hi,Vitan this mail from DeliverFast.com to confirm  you that you are register in system";
$headers="From: vitan2001@gmail.com";

if(mail($to_email,$subject,$body,$headers))
{
    echo "email successfully sent to  $to_email";
}
else{
    echo "Email sending is fail...";
}

?>