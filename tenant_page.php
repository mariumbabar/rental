<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['tenant_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tenant's Dashboard</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="welcome.css">

</head>

<body>
   <!-- code for the menu bar & logo for the webpage-->
   <div class="banner">
      <div class="navbar">
         <a href="homepage.html"><img src="logo.png" alt="Homepage" style="width:150px;height:150px;"></a>

         <ul>
            <li><a href="listings.php">Listings</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact Us</a></li>
         </ul>
      </div>
   
<div class="container">

   <div class="content">
      <h3><span>tenant's dashboard</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['tenant_name'] ?></span></h1>
      <p>What do you want to do today?</p>
      <a href="reserve.php" class="btn">Reservation Request</a>
      <br>
      <a href="payments.php" class="btn">Payment Portal</a>
      <br>
      <a href="logout.php" class="btn">Logout</a>
   </div>

</div>

</body>
</html>