<?php 
session_start();    
include('../includes/connect.php');
include('../functions/common_function.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

$get_ip_address = getIPAddress();
$delivery_charge = 100;
$status = 'Pending';

// Calculate total quantity and subtotal
$total_quantity = 0;
$subtotal = 0;

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $item) {
        $product_price = $item['product_price'];
        $product_quantity = $item['quantity'];
        $size = $item['product_size'];
        $product_total_price = $product_price * $product_quantity;
        $total_quantity += $product_quantity;
        $subtotal += $product_total_price;
    }
}

$total_price = $subtotal + $delivery_charge;

// Generate a random invoice number
$invoice_number = rand(100000, 999999);

$count_products = count($_SESSION['cart']);

// Insert each product into orders_pending table
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $item) {
        $product_price = $item['product_price'];
        $product_quantity = $item['quantity'];
        $size = $item['product_size'];

        $insert_pending_order_item = "INSERT INTO orders_pending(user_id, invoice_number, product_id, quantity, size, order_status, isVerified) 
        VALUES($user_id, $invoice_number, $product_id, $product_quantity, '$size', 'pending', 'false')";
        $result_pending_order_item = mysqli_query($conn, $insert_pending_order_item);
    }
}

// Insert into user_orders table
$insert_order = "INSERT INTO user_orders(user_id, amount_due, invoice_number, total_products, order_date, order_status) 
VALUES($user_id, $total_price, $invoice_number, $count_products, NOW(), '$status')";
$result_query = mysqli_query($conn, $insert_order);

if ($result_query) {
    // Delete items from cart
    unset($_SESSION['cart']);
    echo "<script>alert('Orders are submitted in your pending order list')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
} else {
    echo "<script>alert('Error submitting orders')</script>";
    echo "<script>window.open('index.php', '_self')</script>";
}
?>
