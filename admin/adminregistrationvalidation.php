<?php
session_start();
header('location:adminlogin.php');


$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];



if (!empty($fullname) || !empty($email) || !empty($password))   {
   
    $host = "localhost";
    $dbUsername = "root";
    $dbpassword = "";
    $dbname = "safi";

     //create connection
     $conn = new mysqli($host, $dbUsername, $dbpassword, $dbname);

     if (mysqli_connect_error())  {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
     
    }  else  {
       $SELECT = "SELECT email From safiadmin Where email = ? Limit 1";
       $INSERT = "INSERT Into safiadmin(fullname, email, password)
        values(?, ?, ?)";

        //prepare Statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;


        if ($rnum==0)  {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sss", $fullname, $email, $password);
            $stmt->execute();

            $_SESSION['status'] = "Registration was Succesful";
            header('location:adminlogin.php');
        }  else  {
            $_SESSION['status'] = "<p id=notif >Someone already registered using this Email ID</p>";
            header('location:adminregistration.php');
        }

        $stmt->close();
        $conn->close();

     }
}     else {
    echo "All Fields Are Required";
    die();
}



?>