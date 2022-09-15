	
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Reservation Page</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="reservations.css">
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


<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>

<div class="container">
   <h1> Reservation Form </h1><br>
   <form action="reserve.php" method= "POST">
    <label for ="p_name"> Property Name: </label><br><br>
    <input type = "text" name="p_name" required/><br><br>
    <label for = "agree_Start_Date"> Agreement Start Date: </label><br>
    <input type = "date" name="agree_Start_Date" required/><br><br>
    <label for = "agree_End_Date"> Agreement End Date: </label><br>
    <input type = "date" name="agree_End_Date" required/><br><br>
    <label for = "t_id"> Tenant ID: </label><br>
    <input type = "number" name="t_id" required/><br><br>
    <input type="submit" name="reserve" class="btn" value="Reserve"><br><br>
</form>
</div>
</div>



<?php
include 'config.php';

if(isset($_POST['reserve'])) {
   
  $p_name = $_POST['p_name'];
   $agree_Start_Date = $_POST['agree_Start_Date'];
   $agree_End_Date = $_POST['agree_End_Date'];
   $t_id = $_POST['t_id'];
   
   
      $sql = "INSERT INTO reservations (p_name, agree_Start_Date, agree_End_Date, t_id, status)
      VALUES ('$p_name', '$agree_Start_Date', '$agree_End_Date', '$t_id', 'pending')";

     if (mysqli_query($conn, $sql)) {
        $message[] = "Request has been sent successfully !";
        echo "Request Sent";
     } else {
        $message[] = "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}


?> 
</body>
</html>