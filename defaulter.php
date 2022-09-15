<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width">

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

      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Defaulters ID List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Defaulters Tenant ID List</h4>
                    </div>
                </div>
            </div>

            <!-- Status List  -->
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Filter 
                                <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                            </h5>
                        </div>
                        <div class="card-body">
                            <h6>Payment Status</h6>
                            <hr>
                            <?php
                                include 'config.php';

                                $status_query = "SELECT * FROM payment_status";
                                $status_query_run  = mysqli_query($conn, $status_query);
                                 
                                 //checking for records
                                if(mysqli_num_rows($status_query_run) > 0)
                                {   //looping the data
                                    foreach($status_query_run as $statuslist)
                                    {
                                        $checked = [];
                                        if(isset($_GET['Status']))
                                        {
                                            $checked = $_GET['Status'];
                                        }
                                        ?>
                                            <div>
                                                <input type="checkbox" name="Status[]" value="<?= $statuslist['id']; ?>" 
                                                    <?php if(in_array($statuslist['id'], $checked)){ echo "checked"; } ?>
                                                 />
                                                <?= $statuslist['type']; ?>
                                            </div>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No Property Found";
                                }
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Properties -->
            <div class="col-md-9 mt-3">
                <div class="card ">
                    <div class="card-body row">
                        <?php
                            if(isset($_GET['Status']))
                            {
                                $statuschecked = [];
                                $statuschecked = $_GET['Status'];
                                foreach($statuschecked as $rowstatus)
                                {
                                    // echo $rowbrand;
                                    $payments = "SELECT * FROM payments WHERE Status IN ($rowstatus)";
                                    $payments_run = mysqli_query($conn, $payments);
                                    if(mysqli_num_rows($payments_run) > 0)
                                    {
                                        foreach($payments_run as $paymentnos) :
                                            ?>
                                                <div class="col-md-4 mt-3">
                                                    <div class="border p-2">
                                                        <h6><?= $paymentnos['t_id']; ?></h6>
                                                    </div>
                                                </div>
                                            <?php
                                        endforeach;
                                    }
                                }
                            }
                            else
                            {
                                $payments = "SELECT * FROM payments";
                                $payments_run = mysqli_query($conn, $payments);
                                if(mysqli_num_rows($payments_run) > 0)
                                {
                                    foreach($payments_run as $paymentnos) :
                                        ?>
                                            <div class="col-md-4 mt-3">
                                                <div class="border p-2">
                                                    <h6><?= $paymentnos['t_id']; ?></h6>
                                                </div>
                                            </div>
                                        <?php
                                    endforeach;
                                }
                                else
                                {
                                    echo "No Items Found";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>