<?php
session_start();

$conn = mysqli_connect ('localhost', 'root', '');
mysqli_select_db($conn, 'safi');

$email=$_POST['email'];
$password=$_POST['password'];


$SELECT = "SELECT * From safiadmin Where email = '$email' && password = '$password'" ;
$RESULT = mysqli_query($conn, $SELECT);
$num = mysqli_num_rows($RESULT);

if($num == 1) {
    $_SESSION['status'] = "Login Succesful";
    header('location:feedback.html');
} else {
    $_SESSION['status'] = "<p id=notif> Invalid Email or Password</p>";
    header('location:adminlogin.php');
}

?>




