<?php
session_start();




if(isset($_POST['fullname']) && isset($_POST['phonenumber']) && isset($_POST['idnumber']) && isset($_POST['bookday'])
 && isset($_POST['location']) && isset($_POST['purchase']) )    {
   
    $host = "localhost";
    $dbUsername = "root";
    $dbpassword = "";
    $dbname = "safi";

     //create connection
     $conn = new mysqli($host, $dbUsername, $dbpassword, $dbname);

     if (mysqli_connect_error())  {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
     
    } 
    
    function validate($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fullname = validate($_POST['fullname']);
    $phonenumber = validate($_POST['phonenumber']);
    $idnumber = validate($_POST['idnumber']);
    $bookday = validate($_POST['bookday']);
    $location = validate($_POST['location']);
    $purchase = validate($_POST['purchase']);

    if(empty($fullname) || empty($phonenumber) || empty($idnumber) || empty($bookday)
    || empty($location) || empty($purchase) ) {

        header("location:purchase.php");
    }
    else {

        $sql = "INSERT into laundry(fullname, phonenumber, idnumber, bookday, location, purchase) 
        VALUES('$fullname', '$phonenumber', '$idnumber', '$bookday', '$location', '$purchase')";
        $res = mysqli_query($conn, $sql);

        if($res) {

            $_SESSION['status'] = "Order Submitted Succesfully. Wait for Response.";
           header('location:purchase.php');

        }else {
            
            $_SESSION['status'] = "Message Not Sent";  
            header('location:purchase.php');

        }
    }

}else {
    header("location:purchase.php");
}
    

