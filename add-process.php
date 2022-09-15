<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Property</title>
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="process.css">

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

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Add a New Property </h3>
         <input type="text" placeholder="Enter property name" name="property_name" class="box">
         <input type="number" placeholder="Enter property rent" name="property_rent" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="number" placeholder="Please enter deposit amount" name="property_deposit" class="box">
         <input type="text" placeholder="Please enter the address" name="property_address" class="box">
         <input type="text" placeholder="Please enter property description" name="property_description" class="box">
         <input type="text" placeholder="Please enter property type" name="property_type" class="box">
      </select><br>
         <input type="submit" class="btn" name="add_property" value="Add Property">
      </form>
   </div>
<?php

@include 'config.php';

if(isset($_POST['add_property'])){

   $property_name = isset($_POST['property_name']) ? $_POST['property_name'] : '';
   $property_rent = isset($_POST['property_rent']) ? $_POST['property_rent'] : '';
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;
   $property_deposit = $_POST['property_deposit'];
   $property_address = $_POST['property_address'];
   $property_description = $_POST['property_description'];
   $property_type = isset($_POST['property_type']);

      $insert = "INSERT INTO property(property_name, rent, image, deposit, address, description, type, status) VALUES('$property_name', '$property_rent', '$product_image', '$property_deposit', '$property_address', '$property_description', '$property_type', '1')";

      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'New product added successfully';
      }else{
         $message[] = 'Could not add the product';
      }
   };


;

?>




   <?php

   $select = mysqli_query($conn, "SELECT * FROM property");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>property image</th>
            <th>property name</th>
            <th>property rent</th>
            <th>property deposit</th>
            <th>property address</th>
            <th>property description</th>
            <th>property type</th>
            
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['property_name']; ?></td>
            <td>AED<?php echo $row['rent']; ?></td>
            <td>AED<?php echo $row['deposit']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['type']; ?></td>
           
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>