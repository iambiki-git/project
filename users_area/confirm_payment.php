<?php
  include('../includes/connect.php');
  session_start();
  if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    // echo $order_id;

    $select_data = "SELECT * FROM user_orders WHERE order_id = $order_id";
    $result = mysqli_query($conn, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_num = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
  }

  // if confirm_payment is set first accessing and then inserting into database table user_payments
  if(isset($_POST['confirm_payment'])){
    $invoice_num = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];

    $insert_query = "INSERT INTO user_payments (order_id, invoice_number, amount, 
    payment_mode) VALUES($order_id, $invoice_num, $amount, '$payment_mode')";
    $result = mysqli_query($conn, $insert_query);
    if($result){
        echo "<script>alert('Payment Completed Successfully')</script>";
        echo "<script>window.open('profile.php?my_orders', '_self')</script>";
    }

    // after confirming payment mode changing status 
    $update_orders = "UPDATE user_orders set order_status = 'Complete' WHERE order_id = $order_id";
    $run_update_orders = mysqli_query($conn, $update_orders);

   
     // updating user_pending table isverified attribute
     $update_user_pending = "UPDATE orders_pending SET isVerified = 'true' WHERE invoice_number = $invoice_num";
     $run_update_user_pending = mysqli_query($conn, $update_user_pending);
   



  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment-page</title>

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .form-outline .mysele{
            height: 37px;
            border-radius: 3px;
        }
    </style>


</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h2 class="text-center text-warning mb-4" style="font-size:38px;">Confrim Payment</h2>
        <form action="" method="POST">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_num ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-center text-light mt-3 mb-0">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 mt-4 border-0 mysele">
                    <option disabled selected>Select Payment Mode</option>
                    <option>Khalti</option>
                    <option>eSewa</option>
                    <option>Net Banking</option>
                    <option>Cash On Delivery</option>
                </select>                
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="btn btn-success px-4 mt-4" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>