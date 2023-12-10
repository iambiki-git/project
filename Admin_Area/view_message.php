<table class="table table-bordered mt-4 text-center">
    <thead class='bg-info'>
        <tr>
            <th>SN</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Message</th>
            <th>User Id</th>
           
        </tr>
    </thead>

    <tbody class="bg-secondary text-light text-center">
        <?php
            $select_query = "SELECT * FROM contact_us_table";
            $run = mysqli_query($conn, $select_query);
            
                     
                $number = 0;
                while($row=mysqli_fetch_assoc($run)){
                    $user_id = $row['userId'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $email = $row['email'];
                    $message = $row['message'];
                    $number++;
                    echo "
                    <tr>
                    <td>$number</td>
                    <td>$firstname</td>
                    <td>$lastname</td>
                    <td>$email</td>
                    <td>$message</td>
                    <td>$user_id</td>

                </tr>";
                    
                }
                ?>
                
                    
        
    </tbody>
</table>



<form method="POST">
    <input type="submit" value="Clear all messages" class="btn btn-dark" name="submit">
</form>
<?php
    
    if(isset($_POST['submit'])){
        $sql = "DELETE FROM contact_us_table";
        $run = mysqli_query($conn, $sql);
        if($run){
            echo "<script>alert('Messages deleted')</script>";
            echo "<script>window.open('adminPanel.php?user_message','_self')</script>";
        }
    }

?>



                