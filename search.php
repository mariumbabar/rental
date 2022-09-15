 <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search Results</title>
   

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

<div class="container">
 <div class="product-display">
    <?php 
            include 'config.php';
    
            if(isset($_GET['search']))
            {
             $filtervalues = $_GET['search'];
             $query = "SELECT * FROM property WHERE CONCAT(address,description,type) LIKE '%$filtervalues%' ";
             $query_run = mysqli_query($conn, $query);

             if(mysqli_num_rows($query_run) > 0)
             {
               foreach($query_run as $rows)
                {
                ?>
            <tr>
            <td><img src="uploaded_img/<?php echo $rows['image']; ?>" height="300" width="500" alt=""></td><br>
            <tr><?= $rows['property_name']; ?></tr><br>
            <tr>Monthly Rent: AED<?= $rows['rent']; ?></tr><br>
            <tr>Initial Deposit: AED<?= $rows['deposit']; ?></tr><br>
            <tr>Address: <?= $rows['address']; ?></tr><br>
            <tr>Description: <?= $rows['description']; ?></tr><br>
            <tr>Property Type: <?= $rows['type']; ?></tr><br><br><br>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td>No Record Found</td>
                                                </tr>
                                              </tr>
                                          </div>
                                             </div>
                                            <?php
                                        }
                                    }