<h2 class="text-center text-success">Payment List</h2>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-info">
        <?php
        // select query for fetching from user_orders table
            $get_payments = "SELECT * FROM user_payments";
            $result = mysqli_query($conn, $get_payments);
            $row = mysqli_num_rows($result);
            

            if($row == 0){
                echo "<h2 class='text-danger text-center mt-5'>No Payment Received Yet</h2>";
            }else{
              echo " <tr>
            <th>S.N</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Order Date</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
                $number = 0;
                while($row_data = mysqli_fetch_assoc($result)){
                    $order_id = $row_data['order_id'];
                    $payment_id = $row_data['payment_id'];
                    $invoice_number = $row_data['invoice_number'];
                    $amount = $row_data['amount'];
                    $payment_mode = $row_data['payment_mode'];
                    // $total_products = $row_data['total_products'];
                    $order_date = $row_data['date'];
                    // $order_status = $row_data['order_status'];
                    $number++;
                    echo " <tr>
                    <td>$number</td>
                    <td>$invoice_number</td>
                    <td>$amount</td>
                    <td>$payment_mode</td>
                    <td>$order_date</td>
                    <td><a href='adminPanel.php?delete_payment=$payment_id' type='button' class='text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="adminPanel.php?payment_list" class="text-light">No</a></button>
        <button type="button" class="btn btn-primary"><a href='adminPanel.php?delete_payment=<?php echo $payment_id; ?>' class="text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>