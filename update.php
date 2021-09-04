<?php

require_once "base.php";

$id = $_POST['id'];
$name= $_POST['edit-name'];
$phone= $_POST['edit-number'];
$sql = "UPDATE contacts SET name='$name',phone='$phone' WHERE id=$id";
$con = con();
if(mysqli_query($con,$sql)){
    echo "success";
}
else{
    echo mysqli_error($con);
}

?>