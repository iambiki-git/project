<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $username = $_SESSION['username'];
        $get_user = "SELECT * FROM user_table WHERE user_name = '$username'";
        $result = mysqli_query($conn, $get_user);
        $row_fetch = mysqli_fetch_assoc($result);
        $user_id = $row_fetch['user_id'];
        // echo $user_id;
    ?>
    <h3 class="text-success mt-3">Your Pending Orders List</h3>
        <table class="table table-bordered mt-4">
            <!-- <thead class="bg-info">
                <tr>
                    <th class="bg-info">S.NO</th>
                    <th class="bg-info">Total Products</th>
                    <th class="bg-info">Amount Due</th>
                    <th class="bg-info">Invoice Number</th>
                    <th class="bg-info">Date</th>
                    <th class="bg-info">Complete/Incomplete</th>
                    <th class="bg-info">Status</th>
                </tr>
            </thead> -->
            
            <tbody>
            <?php
                $get_order_details = "SELECT * FROM user_orders WHERE user_id = $user_id";
                $result_orders = mysqli_query($conn, $get_order_details);
                $row = mysqli_num_rows($result_orders);
                if($row == 0){
                    echo "<h2 class='text-danger mt-5'>No Orders Made</h2>";
                }else{
                    echo "<thead class='bg-info'>
                    <tr>
                        <th class='bg-info'>S.NO</th>
                        <th class='bg-info'>Total Products</th>
                        <th class='bg-info'>Amount Due</th>
                        <th class='bg-info'>Invoice Number</th>
                        <th class='bg-info'>Date</th>
                        <th class='bg-info'>Status</th>
                        <th class='bg-info'>Delete Order</th>
                        <th class='bg-info'>Payment</th>
                    </tr>
                </thead>";
                }
               
                $number = 1;
                while($row_orders = mysqli_fetch_assoc($result_orders)){
                    $order_id = $row_orders['order_id'];
                    $amount_due = $row_orders['amount_due'];
                    $total_products = $row_orders['total_products'];
                    $invoice_number = $row_orders['invoice_number'];
                    $order_date = $row_orders['order_date'];
                    $order_status  = $row_orders['order_status'];
                    if($order_status == 'Pending'){
                        $order_status = 'Incomplete';
                    }else{
                        $order_status = 'Complete';
                    }
                    

                    
                    echo "<tr>
                    <td class='bg-secondary text-light'>$number</td>
                    <td class='bg-secondary text-light'>$total_products <a href='profile.php?my_orders&show_product_detail=$invoice_number'>
                    <i class='fa-sharp fa-solid fa-eye text-light'></a></i></td>
                    <td class='bg-secondary text-light'>$amount_due</td>
                    <td class='bg-secondary text-light'>$invoice_number</td>
                    <td class='bg-secondary text-light'>$order_date</td>
                    <td class='bg-secondary text-light'>$order_status</td>
                    <td class='bg-secondary text-light'><a href='cancel_order.php?order_id=$order_id' class='text-danger'><i class='fa-solid fa-trash'></i></a></td>";

                    

                    ?>
                    <?php
                    if($order_status == 'Complete'){
                        echo "<td class='bg-secondary text-light'>Paid</td>";
                    }else{
                        echo "<td class='bg-secondary text-light'><a href='billing.php?order_id=$order_id' class='text-warning'>Click here</a></td>
                        </tr>";    
                    }
                $number++;
                }
            ?>
               
            </tbody>
        </table>
</body>
</html>