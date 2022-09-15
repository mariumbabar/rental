<?php

@include 'config.php';

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
   $select = " SELECT * FROM user_fomr WHERE email = '$email' && password = '$pass' ";
   //performing query against database
   $result = mysqli_query($conn, $select);

   //if condition to check if the details are previously stored - validation of user details
   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists!';

   }else{

      //nested if condition to validate password 
      if($pass != $cpass){
         $error[] = 'Password not matched!';

      }else{
         
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";

         //running SQL insert query & redirecting to the login page
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
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
   <!--form to enter the registeration details-->
   <form action="" method="post">
      <h3>register now</h3>

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
     
      <input type="text" name="name"  placeholder="enter your name" pattern="[a-z]{1,15}" id="username" required ><br>
      <input type="email" name="email"  placeholder="enter your email" required ><br>
      <input type="password" name="password" required placeholder="enter your password"><br>
      <input type="password" name="cpassword" required placeholder="confirm your password"><br>

      <select name="user_type">
         <option value="tenant">tenant</option>
         <option value="owner">owner</option>
      </select><br>

      <input type="submit" name="submit" value="REGISTER" class="form-btn">

      <p>already have an account?<br><a href="login_form.php">login now</a></p>
   </form>
   </div>



</body>
</html>

