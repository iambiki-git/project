<?php

include('../includes/connect.php');

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];

    $select_query = "SELECT * FROM user_orders WHERE order_id = $order_id";
    $run = mysqli_query($conn, $select_query);
    if(mysqli_num_rows($run)>0){
        $row_data = mysqli_fetch_assoc($run);
        $invoice_number = $row_data['invoice_number'];
    }
    



    // Update the order status to 'Cancelled' in the database
    $cancel_query = "DELETE FROM user_orders WHERE order_id = $order_id";
    mysqli_query($conn, $cancel_query);

    $delete_order = "DELETE FROM orders_pending WHERE invoice_number= $invoice_number";
    mysqli_query($conn, $delete_order);

    // Redirect the user back to the page where they came from (orders list)
    header("Location: profile.php?my_orders");
    exit();
}
?>