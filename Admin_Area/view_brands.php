
<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-4 text-center">
    <thead class="bg-info">
        <tr>
            <th>SN</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light text-center">
        <?php
            $select_query = "SELECT * FROM brands";
            $run = mysqli_query($conn, $select_query);
            $number = 0;
            while($row=mysqli_fetch_assoc($run)){
                $brand_id = $row['brand_id'];
                $brand_title = $row['brand_title'];
                $number++;
        ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $brand_title; ?></td>
            <td><a href='adminPanel.php?edit_brand=<?php echo $brand_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='adminPanel.php?delete_brand=<?php echo $brand_id; ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
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