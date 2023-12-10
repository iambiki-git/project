<?php
    if(isset($_GET['delete_user'])){
        $delete_id = $_GET['delete_user'];
        // echo $delete_id;

        // delete query
        $delete_query = "DELETE FROM user_table WHERE user_id = $delete_id";
        $run_delete_query = mysqli_query($conn, $delete_query);
        if($run_delete_query){
            echo "<script>alert('User Deleted Successfully')</script>";
            echo "<script>window.open('adminPanel.php?users_list', '_self')</script>";
        }


    }
?>  