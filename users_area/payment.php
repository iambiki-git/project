<?php 
    @session_start();
    include('../functions/common_function.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">

    <style>
        img{
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- php code to access user id -->
    <?php
        // $user_ip = getIPAddress();
        // $get_user = "SELECT * FROM user_table WHERE user_ip = '$user_ip'";
        // $result = mysqli_query($conn, $get_user);
        // $run_query = mysqli_fetch_array($result);   
        // $user_id = $run_query['user_id'];
        
        
        $username = $_SESSION['username'];
        $get_user = "SELECT * FROM user_table WHERE user_name = '$username'";
        $result = mysqli_query($conn, $get_user);
        $run_query = mysqli_fetch_array($result);   
        $user_id = $run_query['user_id'];

    ?>


    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <!-- <a href="#"><img src="../images/khalti.png" alt="sample pic"></a> -->
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id  ?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>
    </div>
    
</body>
</html>