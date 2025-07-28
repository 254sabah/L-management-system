<?php

$con = new mysqli('localhost', 'root', '', 'safi');
if(!$con) {
  
    die(mysqli_error($con));
}

?>