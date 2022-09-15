<?php

@include 'config.php';

//creates a session based on a session identifier passed via the POST request from the submit form 
session_start();

//using the isset method to check if the form is submitted successfully 
if(isset($_POST['submit'])){
   
   // string using mysqli_real_string to remove special characters
   //$_POST used to collect data from the form
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   //md5() for hash generation of the string
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   
   //Selecting the email and password data from the database
   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   //performing query against database
   $result = mysqli_query($conn, $select);
   
   //checking if the number of rows in the database is more than 0, if true then the array stored is fetched, if false error message is displayed.
   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);

      //if statement to load pages according to the user type 
      if($row['user_type'] == 'owner'){
         $_SESSION['owner_name'] = $row['name'];
         header('location:owner_page.php');

      }elseif($row['user_type'] == 'tenant'){
         $_SESSION['tenant_name'] = $row['name'];
         header('location:tenant_page.php');
      }
     
   }else{
      $error[] = 'Incorrect Email or Password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
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
   
<div class="form-container">
   <!--form to enter the login details-->
   <form action="" method="post">
      <h3>login now</h3>

      <!--
         The isset() function checks that the value is set & not NULL, it checks the value of $error, the foreach loop ensures it checked to each pair in the array and an error message is displayed if the input does not match any of the user type information in the database 
      -->
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
     
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">

      <input type="submit" name="submit" value="login now" class="form-btn">

      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>
</div>
</body>
</html>