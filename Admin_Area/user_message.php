<h3 class="text-center text-success">All Messages</h3>
<table class="table table-bordered mt-4 text-center">
    
    <tbody class="bg-secondary text-light text-center">
        <?php
            $select_query = "SELECT * FROM contact_us_table";
            $run = mysqli_query($conn, $select_query);
            $row_count = mysqli_num_rows($run);
            if($row_count == 0){ 
                echo "<h3 class='text-center text-danger mt-3'>No messages found</h3>";
            }else{
                echo "
                    <h3 class='text-center text-info'>You have total $row_count messages</h3>
                    <h4 class='text-center'><a href='adminPanel.php?user_message&view_message' class='text-dark'>view messages</a></h4>";
               
            }
        ?>   
                
            
    </tbody>
</table>

<?php


?>
