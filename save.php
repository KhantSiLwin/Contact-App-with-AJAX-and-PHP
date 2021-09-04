<?php

require_once "base.php";

$name= $_POST['contact-name'];
$phone= $_POST['phone-number'];
$sql = "INSERT INTO contacts (name,phone) VALUES ('$name','$phone')";
$con = con();
if(mysqli_query($con,$sql)){
    echo "success";
}
else{
    echo mysqli_error($con);
}

?>