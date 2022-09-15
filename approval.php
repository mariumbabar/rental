<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Agreement Page</title>
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="approval.css">

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

    <div class="center">

    	<h1>Reservation Agreement List</h1>

    	<table id="requests" class="requests">
        <thead>
    	<tr>
    		<th> Property Name </th>
    	    <th> Agreement Start Date </th>
    	    <th> Agreement End Date </th>
    	    <th> Tenant ID </th>
    	    <th> Action </th>
    	 </tr>
        </thead>

    	 <?php 
    	 $query = "SELECT * FROM reservations WHERE status = 'pending' ORDER BY t_id ASC";
    	 $result = mysqli_query($conn, $query);
    	 while($row = mysqli_fetch_array($result)){
         ?>
         <tr><br>
         	<td><?php echo $row['p_name'];?></td>
            <td><?php echo $row['agree_Start_Date'];?></td>
            <td><?php echo $row['agree_End_Date'];?></td>
            <td><?php echo $row['t_id'];?></td>
            <td>
            	<form action="approval.php" method="POST">
            		<input type="hidden" name="p_name" value="<?php echo $row['p_name'];?>"/>
            		<input type="submit" class="btn" name="approve" value="Approve"/> 
                    <input type="submit" class="btn" name="deny" value="Deny"/>
                </form>
            </td>
        </tr>
    </table>

    <?php
    
           }
           ?>

    </div>

    <?php

    if(isset($_POST['approve'])){
    	$p_name = $_POST['p_name'];

    	$select = "UPDATE reservations SET status = 'approved' WHERE p_name='$p_name'";
    	$result = mysqli_query($conn, $select);

    	echo '<script type = "text/javascript">';
    	echo 'alert("Reservation Approved!");';
    	echo 'window.location.href - "approval.php"';
    	echo '</script>';
    }
    
    if(isset($_POST['deny'])) {
    	$p_name = $_POST['p_name'];

    	$select = "DELETE FROM reservations WHERE p_name='$p_name'";
    	$result = mysqli_query($conn, $select);

    	echo '<script type = "text/javascript">';
    	echo 'alert("Reservation Denied!");';
    	echo 'window.location.href - "approval.php"';
    	echo '</script>';
    }

 ?>

</div>
</body>
</html>