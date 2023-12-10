<h3 class="text-center text-success">Billing Details</h3>

    
        <?php
            $select_query = "SELECT * FROM billing_details";
            $run = mysqli_query($conn, $select_query);
            // $number = 0;
            if(mysqli_num_rows($run) == 0){
              echo "<h3 class='text-danger text-center mt-3 font-weight-bold'>No billing records found</h3>";
            }else{
              echo "<table class='table table-bordered mt-4 text-center'>
              <thead class='bg-info'>
                  <tr>
                      <th>Bill no</th>
                      <th>Invoice no</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Company name</th>
                      <th>State</th>
                      <th>City</th>
                      <th>Street address</th>
                      
                      <th>Phone no</th>
                      <th>Delete</th>
                  </tr>
              </thead>
              <tbody class='bg-secondary text-light text-center'>";
            }
            while($row=mysqli_fetch_assoc($run)){
                $bill_no = $row['bill_no'];
                $invoice_number = $row['invoice_number'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $company_name = $row['company_name'];
                $state = $row['state'];
                $city = $row['city'];
                $street_address = $row['street_address'];
                // $postal_code = $row['postal_code'];
                $phone_no = $row['phone_no'];
                // $number++;
        ?>
        <tr>
            <td><?php echo $bill_no; ?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $firstname; ?></td>
            <td><?php echo $lastname; ?></td>
            <td><?php echo $company_name; ?></td>
            <td><?php echo $state; ?></td>
            <td><?php echo $city; ?></td>
            <td><?php echo $street_address; ?></td>
            
            <td><?php echo $phone_no; ?></td>
            <td><a href='delete_billing_details.php?invoice_number=<?php echo $invoice_number; ?>' class='text-danger'><i class='fa-solid fa-trash'></i></a></td>
            
            <!-- <td><a href='adminPanel.php?edit_brand=<?php echo $brand_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='adminPanel.php?delete_brand=<?php echo $brand_id; ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td> -->
        </tr>
        <?php

            } ?>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="adminPanel.php?view_brands" class="text-light">No</a></button>
        <button type="button" class="btn btn-primary"><a href='adminPanel.php?delete_brand=<?php echo $brand_id; ?>' class="text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>