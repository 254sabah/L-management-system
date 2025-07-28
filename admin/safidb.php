<?php
session_start();


include 'connect.php';
if(isset($_POST['submit']))


{
    $fullname=$_POST['fullname'];
    $phonenumber=$_POST['phonenumber'];
    $idnumber=$_POST['idnumber'];
    $bookday=$_POST['bookday'];
    $location=$_POST['location'];
    $purchase=$_POST['purchase'];

    $sql="insert into `laundry` (fullname,phonenumber,idnumber,bookday,location,purchase)
    values('$fullname','$phonenumber','$idnumber','$bookday','$location','$purchase',)";

    $result=mysqli_query($con,$sql);
    if($result) {
        header('location:purchase.php');
    }else{
        die(mysqli_error($con));
    }
  
}



?>



<!DOCTYPE html>
   <html lang="en">
        
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,
         maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Admin/Staff WorkSpace</title>
        <!--<link rel="stylesheet" href="purchase.css">-->


<style>
table,tr,th,td {
    border: 1px; 
    border-color: black;
    border-style: outset;
    background-color: rgba(211,211,211, 0.5);
}

    body {
        background-image: url(2ndbackg.png);
         background-size: cover;
         color: silver;
        color: black;
         background-size: cover;
         background-attachment: fixed;
         font-family: Verdana, Geneva, Tahoma, sans-serif;
         border-color: gray;
         height: 100vh;;
         width:100%;
    }

    #txtbox{
       margin-left:34vw;
       border-style: outset;
       border-width: 4px;
       border-color: silver;
       width: 25vw;
       height: 5vh;
    }

    .btn {
        width: 7vw;
        color: brown;
    }
    #section {
        width: 20vw;
        color: white;
        height: 5vh;
        background-color: teal;
        
    }

#table {

    margin-left: 3vw;
    margin-right: 3vw;
    background-color: lightskyblue;
} 

.updbtn {
    color:white;
    background-color: blue;
}

.delbtn{
    color:white;
    background-color: red;
    width:7vw;
}

.light {
    color:white;
    font-weight: bold;
   
}
.addclient {
    color:white;
    background-color: blue;
}

.locate {
    color: white;
    font-weight: bold;
}



</style>
</head>

<body>
<div class= "container">
    <button class= "addclient"><a href="purchase.php" class="locate">New Client Order</a> </button>
<form action="safidb.php" method="post">

<br/>
<table class="table" id="table">
    <thead>
<tr>
<th scope="col">Sl no</th>
<th scope="col">fullname</th>
<th scope="col">phonenumber</th>
<th scope="col">idnumber</th>
<th scope="col">bookday</th>
<th scope="col">location</th>
<th style="color:darkskyblue;" scope="col">purchase</th>
<th scope="col">operations</th>
</tr>
</thead>

<tbody>

<?php

$sql="select * from `laundry`";
$result=mysqli_query($con,$sql);
if($result) {
    while($row=mysqli_fetch_assoc($result)){

        $id=$row['id'];
        $fullname=$row['fullname'];
        $phonenumber=$row['phonenumber'];
        $idnumber=$row['idnumber'];
        $bookday=$row['bookday'];
        $location=$row['location'];
        $purchase=$row['purchase'];
        echo '
        <tr>
<th scope="row">'.$id.'</th>
<td>'.$fullname.'</td>
<td>'.$phonenumber.'</td>
<td>'.$idnumber.'</td>
<td>'.$bookday.'</td>
<td>'.$location.'</td>
<td style="font-weight:bold;">'.$purchase.'</td>

<td>
   
&nbsp;
    <button class="delbtn"> <a href="delete.php?
    deleteid='.$id.'" class="light"> Delete </a></button>
</td>

        </tr>';

    }   
}

?>
 <!--<button class="updbtn"> <a href="update.php?
    updateid='.$id.'" class="light"> Update </a></button>-->

</tbody>
</table>
</div>



 