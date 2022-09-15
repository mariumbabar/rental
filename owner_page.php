<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['owner_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Owner Dashboard</title>

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
      <h3><span>owner's dashboard</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['owner_name'] ?></span></h1>
      <p>What do you want to do today?</p>
      <a href="add-process.php" class="btn">Add property</a>
      <br>
      <a href="approval.php" class="btn">Pending Agreement</a>
      <br>
      <a href="status.php" class="btn">Property Status</a>
      <br>
      <a href="defaulter.php" class="btn">Defaulters List</a>
      <br>
      <a href="index.html" class="btn">Send Defaulter Email</a>
      <br>
      <a href="logout.php" class="btn">Logout</a>

   </div>

</div>

</body>
</html>