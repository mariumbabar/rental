 <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Property</title>
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="listings.css">

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
include 'config.php';
?>

<div class="container">
<form action="search.php" class="search-bar" method="GET">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary"><img src="search.png"></button>
                                    </div>
                                </form>

<h2>Listings</h2>

<?php
  $sql = "SELECT * FROM property";
  $result = mysqli_query($conn, $sql);
  $queryResults = mysqli_num_rows($result);
?>
<div class="container">

   <div class="product-display">
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="300" width="500" alt=""></td><br><br><br>
            <td><?php echo $row['property_name']; ?></td><br>
            <td>Monthly Rent: AED<?php echo $row['rent']; ?></td><br>
            <td>Initial Deposit: AED<?php echo $row['deposit']; ?></td><br>
            <td>Address: <?php echo $row['address']; ?></td><br>
            <td>Description: <?php echo $row['description']; ?></td><br>
            <td>Property Type: <?php echo $row['type']; ?></td><br><br><br>
            <td></td><br><br><br>
        
         </tr>
      <?php } ?>
      </table>
</div>
</div>
</body>
</html>