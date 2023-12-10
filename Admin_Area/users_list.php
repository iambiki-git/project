<h2 class="text-center text-success">Users List</h2>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-info">
        <?php
        // select query for fetching from user_orders table
            $get_users_list = "SELECT * FROM user_table";
            $result = mysqli_query($conn, $get_users_list);
            $row = mysqli_num_rows($result);
            

            if($row == 0){
                echo "<h2 class='text-danger text-center mt-5'>No Users Yet</h2>";
            }else{
              echo " <tr>
            <th>S.N</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Id</th>
            <th>User Image</th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
                $number = 0;
                while($row_data = mysqli_fetch_assoc($result)){
                    $user_id = $row_data['user_id'];
                    $user_name = $row_data['user_name'];
                    $user_email = $row_data['user_email'];
                    $user_image = $row_data['user_image'];
                    $user_address = $row_data['user_address'];
                    $user_mobile = $row_data['user_mobile'];
                    $number++;
                    echo " <tr>
                    <td>$number</td>
                    <td>$user_name</td>
                    <td>$user_email</td>
                    <td>$user_id</td>
                    <td><img src='../users_area/user_images/$user_image' alt='$user_name' class='edit_image'/></td>
                    <td>$user_address</td>
                    <td>$user_mobile</td>
                    <td><a href='adminPanel.php?delete_user=$user_id' type='button' class='text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="adminPanel.php?users_list" class="text-light">No</a></button>
        <button type="button" class="btn btn-primary"><a href='adminPanel.php?delete_user=<?php echo $user_id; ?>' class="text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>