
<h3 class="text-success text-center">All Products</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-warning text-center">
        <tr>
            <th class="px-5">SN</th>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light text-center">
        <?php
      
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            
        }else{
            $page = 1; 
        }
        
            $get_products = "SELECT * FROM products";
            $result = mysqli_query($conn, $get_products);
            $row_counts = mysqli_num_rows($result);
            $number_pages = 5;
            $total_pages = ceil($row_counts/$number_pages);
            
            // Ensure $page is within the valid range
            if ($page < 1) {
                $page = 1;
            } elseif ($page > $total_pages) {
                $page = $total_pages;
            }
             // creating pagination buttons
                echo "<nav aria-label='Page navigation example'><ul class='pagination'>";
                if ($page > 1) {
                    $previous_page = $page - 1;
                    echo "<li class='page-item'><a class='page-link' href='adminPanel.php?view_products&page=".$previous_page."'>Previous</a></li>";
                }
                for ($btn = 1; $btn <= $total_pages; $btn++) {
                    echo '<li class="page-item';
                    if ($btn == $page) {
                        echo ' active';
                    }
                    echo '"><a class="page-link" href="adminPanel.php?view_products&page=' . $btn . '">' . $btn . '</a></li>';
                }
                if ($page < $total_pages) {
                    $next_page = $page + 1;
                    echo "<li class='page-item'><a class='page-link' href='adminPanel.php?view_products&page=".$next_page."'>Next</a></li>";
                }
                echo "</ul>
                    </nav>";
            $startinglimit = ($page-1)*$number_pages;
            $sql = "SELECT * FROM products LIMIT ". $startinglimit.','.$number_pages;
            $result_sql = mysqli_query($conn, $sql);
            $number = $startinglimit;
            while($row = mysqli_fetch_assoc($result_sql)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                $number++;
                ?>
                <tr>
                <td> <?php echo $number; ?></td>
                <td> <?php echo $product_id; ?></td>
                <td><?php echo $product_title; ?></td>
                <td><img src='./product_images/<?php echo $product_image1; ?>' class='edit_image'/></td>
                <td><?php echo $product_price; ?>/-</td>
                <td><?php 
                    
                    $get_count = "SELECT * FROM orders_pending WHERE product_id = $product_id AND isVerified = 'true'";
                    $execute_query = mysqli_query($conn, $get_count);
                    $rows_count = mysqli_num_rows($execute_query);
                    if($rows_count){
                        $fetch_row_data = mysqli_fetch_assoc($execute_query);
                        $quantity = $fetch_row_data['quantity'];
                        echo $quantity;
                    }else{
                        echo '0';
                    }

                ?></td>
                <td><?php echo $status; ?></td>
                <td><a href='adminPanel.php?edit_products=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='adminPanel.php?delete_product=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
        ?>
        
       
    </tbody>
</table>


