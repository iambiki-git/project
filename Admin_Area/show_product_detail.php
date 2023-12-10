<h3 class="text-primary">Ordered Products</h3>
<?php 
        if(isset($_GET['show_product_detail'])){
            $invoice_number = $_GET['show_product_detail'];
            // echo $invoice_number;
        }
    ?>
<table class="table table-bordered mt-4">
           
            
            <tbody>
                   
                <thead class='bg-info'>
                    <tr>
                        <th class='bg-info'>Product Id</th>
                        <th class='bg-info'>Product Image</th>
                        <th class='bg-info'>Quantity</th>
                        <th class='bg-info'>Size</th>
                    </tr>
                </thead>
            <?php

               
                $get_order_details = "SELECT * FROM orders_pending WHERE invoice_number = $invoice_number";
                $result_orders = mysqli_query($conn, $get_order_details);
                $row = mysqli_num_rows($result_orders);
                if($row > 0){
                    while($row_orders = mysqli_fetch_assoc($result_orders)){
                        $product_id = $row_orders['product_id'];
                            $get_image = "SELECT * FROM products WHERE product_id = $product_id";
                            $run_get_image = mysqli_query($conn, $get_image);
                            while($data = mysqli_fetch_assoc($run_get_image)){
                                $product_img = $data['product_image1'];
                            }
                    
                        $quantity = $row_orders['quantity'];
                        $size = $row_orders['size'];

                       echo" <tr>
                       <td class='bg-secondary text-light'>$product_id</td>
                        <td class='bg-secondary text-light'><img src='../Admin_Area/product_images/$product_img' alt='' style='height:70px; width=80px; object-fit:contain;'></td>
                        <td class='bg-secondary text-light'>$quantity</td>
                        <td class='bg-secondary text-light'>$size</td>";
                    }                
                 
                }
                ?>
                
                  
                
                   
                
        
               
            </tbody>
        </table>
            