<h2 class="text-center text-success">Order List</h2>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-info">
        <?php

         

        // select query for fetching from user_orders table
            $get_orders = "SELECT * FROM user_orders";
            $result = mysqli_query($conn, $get_orders);
            $row = mysqli_num_rows($result);
            // echo " <tr>
            // <th>S.N</th>
            // <th>Total Products</th>
            // <th>Due Amount</th>
            // <th>Invoice Number</th>
            // <th>Order Date</th>
            // <th>Status</th>
            // <th>Delete</th>
            // </tr>
            // </thead>
            // <tbody class='bg-secondary text-light'>";

            if($row == 0){
                echo "<h2 class='text-danger text-center mt-5'>No Orders Yet</h2>";
            }else{
              echo " <tr>
            <th>S.N</th>
            <th>Total Products</th>
        
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Order Date</th>
            <th>Delivery Address</th>
            <th>Status</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
                $number = 0;
                while($row_data = mysqli_fetch_assoc($result)){
                    $order_id = $row_data['order_id'];
                    $user_id = $row_data['user_id'];
                    $amount_due = $row_data['amount_due'];
                    $invoice_number = $row_data['invoice_number'];
                    $total_products = $row_data['total_products'];
                    $order_date = $row_data['order_date'];
                    $order_status = $row_data['order_status'];
                    $number++;
                    
                  
                    
                    // getting delivery address from billing details table
                    $address_query = "SELECT * FROM billing_details WHERE invoice_number = $invoice_number";
                    $run_address_query = mysqli_query($conn, $address_query);
                    if(mysqli_num_rows($run_address_query) > 0){
                      
                      $address_data = mysqli_fetch_assoc($run_address_query);
                      $d_address = $address_data['delivery_address'];
                    }else{
                      $d_address = "Not available";
                    }
                    

                    echo " <tr>
                    <td>$number</td>
                    <td>$total_products <a href='adminPanel.php?list_orders&show_product_detail=$invoice_number'>
                    <i class='fa-sharp fa-solid fa-eye text-light'></a></td>
                 
                    <td>$amount_due</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                    <td>$d_address</td>
                    <td>$order_status</td>
                    <td><a href='adminPanel.php?delete_order=$order_id' type='button' class='text-danger' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";

                }
            }

        ?>
       
       
    </tbody>
</table>

<!-- Button trigger modal -->       
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
    </button>  -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
            <h4>Are you sure?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="adminPanel.php?list_orders" class="text-light">No</a></button>
        <button type="button" class="btn btn-primary"><a href='adminPanel.php?delete_order=<?php echo $order_id; ?>' class="text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>