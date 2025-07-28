<?php
session_start();

include 'connect.php';
if(isset($_GET['deleteid']))
{
$id=$_GET['deleteid'];

    $sql="delete from `laundry` where id=$id";
    $result=mysqli_query($con,$sql);

    if($result) {
        header('location:safidb.php');
    }else{
        die(mysqli_error($con));
    }
}


?>