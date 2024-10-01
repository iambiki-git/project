<?php
include 'algorithm_sort.php'; // Include the sorting file

// Fetch all products
$get_products = "SELECT * FROM products";
$result = mysqli_query($conn, $get_products);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Check if sorting is applied through the URL
if (isset($_GET['order'])) {
    $order = $_GET['order']; // 'asc' or 'desc'
    bubbleSortByPrice($products, $order); // Call sorting function by price
}
?>

<h3 class="text-success text-center">All Products</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-warning text-center">
        <tr>
            <th>SN</th>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th><a href="?view_products&order=asc">Product Price &#9650;</a> | 
                <a href="?view_products&order=desc">Product Price &#9660;</a></th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light text-center">
        <?php
        $number = 0;
        foreach ($products as $row) {
            $number++;
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $status = $row['status'];
        ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $product_id; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><img src='./product_images/<?php echo $product_image1; ?>' class='edit_image'/></td>
            <td><?php echo $product_price; ?>/-</td>
            <td><?php 
                $get_count = "SELECT * FROM orders_pending WHERE product_id = $product_id AND isVerified = 'true'";
                $execute_query = mysqli_query($conn, $get_count);
                $rows_count = mysqli_num_rows($execute_query);
                echo $rows_count ? $rows_count : '0';
            ?></td>
            <td><?php echo $status; ?></td>
            <td><a href='adminPanel.php?edit_products=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='adminPanel.php?delete_product=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
