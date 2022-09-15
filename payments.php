  
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Payment Page</title>
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
   <h1> Make Payment </h1><br>
   <form action="payments.php" method= "POST">
    <label for ="t_id"> Tenant ID: </label><br><br>
    <input type = "number" name="t_id" required/><br><br>
    <label for = "Date_Paid">  Date: </label><br>
    <input type = "date" name="Date_Paid" required/><br><br>
      <label for = "Time_Paid"> Time: </label><br>
    <input type = "time" name="Time_Paid" required/><br><br>
    <label for = "Amount_Paid"> Amount: AED </label><br>
    <input type = "number" name="Amount_Paid" required/><br><br>
    <label for = "CC_Number"> Credit Card Number: </label><br>
    <input type = "number" name="CC_Number" required/><br><br>
    <input type="submit" name="payments" class="btn" value="Pay Now"><br><br>
</form>
</div>
</div>



<?php
include 'config.php';

if(isset($_POST['payments'])) {
   
  $t_id = $_POST['t_id'];
  $Date_Paid = $_POST['Date_Paid'];
   $Time_Paid = $_POST['Time_Paid'];
   $Amount_Paid = $_POST['Amount_Paid'];
    $CC_Number = $_POST['CC_Number'];
   

      $sql = "INSERT INTO payments (t_id, Date_Paid, Time_Paid, Amount_Paid, CC_Number, Status)
      VALUES ('$t_id', '$Date_Paid', '$Time_Paid', '$Amount_Paid', '$CC_Number', '1')";
     

     if (mysqli_query($conn, $sql)) {
         $message[] = "Request has been sent successfully !";
        echo "Payment Made of '$Amount_Paid' at '$Date_Paid' on the time '$Time_Paid'";
        //echo $sql;

     } else {
        $message[] = "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
      

?>
</body>
</html>