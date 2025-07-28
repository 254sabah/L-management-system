<?php
session_start();

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,
         maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Admin/Staff login</title>


   <style type="text/css">

   #general {
    background-image: url(lroom.jpeg);
        color: silver;
         background-size: cover;
         background-attachment: fixed;
         font-family: Verdana, Geneva, Tahoma, sans-serif;
         border-style: none;
         
         height: 100%;
         width: 100%;
   }

   #bigtable {
       height: 650;
       width: 800;
     margin-left: 120px;
   }

   #title{
    font-weight: bold;
       color: white;
       font-family: Verdana, Geneva, Tahoma, sans-serif;
       font-size: 11px;
       background-color: blue;
       border-style: outset;
       width: 46vw;
      margin-left: 27vw;
     
       
   }

   #titletext {
      margin-left: 5px;
   }

     .tfield {
        height: 7vh;
        width: 30vw;
        border-color: #fff;
        color: #fff;
       border-style: outset;
       border-width: 4px;
       margin-left: 12vw;
       border-radius: 9px;
     
     }

     #form1 {
         
         border-spacing: 50px;
     }

     #tableform{
        margin-left: 20vw;
        width: 55vw;
        height: 63vh;
        border-style: outset;
        border-color: #fff;
        border-width: 8px;
        background-color: transparent;
        border-radius: 12px;
     }

     #submit {
        color: blue;
         width: 15vw;
         height: 5vh;
         font-size: 1em;
         font-size: 1em;
         margin-left: 20vw;
         height: 5vh;
         display: inline-block;
         text-transform: uppercase;
         text-decoration: none;
         letter-spacing: 2px;
         transition: 0.5s;
         margin-top: 3vh;
         background-color: silver;
     }

     #submit:hover{
    letter-spacing : 6px;
}



     #legend {
        color: silver;
         margin-left: 18vw;
         font-size: 20px
   }

   .alert {
     background-color: brown;
   }
     
   #status{

    background-color: brown;
width: 90%;
max-width: 500%;
text-align: center;
padding: 10px;
margin: 0 auto;
border-radius: 4px;
}

#status.status1{
background-color: brown;
animation: status 4s ease forwards;
}


@keyframes status {
0%{
    opacity: 1;
    pointer-events: all;
}

90%{
    opacity: 1;
    pointer-events: all;
}

100%{
    opacity: 0;
    pointer-events: none;
}
}

      #notif {
        background-color: yellow;
      
      }


     

    
         </style>

</head>

<body id="general">
    
       
           
              <div id="title" width=500px><p id=titletext> <H1>SAFI LAUNDRY ADMIN/STAFF LOGIN</H1></p></td>
            </div> <br/><br/><br/>
    <fieldset id="tableform">
        <tr><td>

        <?php  
        if(isset($_SESSION['status']))
        {  
          ?>
          <div class="status1" id="status" role="alert">
          <strong>!!!</strong> <?php echo $_SESSION['status']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
           <?php
         unset($_SESSION['status']);

        }
        
        ?>

        <legend id="legend">Admin Login Form</legend>
            <form id="form1" action="adminloginvalidation.php" method="POST"> 
             <!--1st row-->   
           
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <br/><br/><br/><input type="email" style="color:black;" class="tfield" name="email" placeholder="Enter Your Email ID" required pattern="[a-z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-z0-9-]+.[a-z]{2,4}" title="Invalid Email">
        <br/><br/><br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <br/><input type="password" style="color:black;" class="tfield" name="password" placeholder="Enter Your password" required>
        <br/><br/>
       
        <input type="submit" value="login" id="submit">
    </a>
        <br/><br/> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;
        <a href="adminregistration.php">Sign Up Here If you do not have an account</a>

    </td></tr> 
    </fieldset> 
    </form>
</body>

</html>
