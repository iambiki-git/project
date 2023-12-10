<?php
    if(isset($_GET['delete_order'])){
        $delete_id = $_GET['delete_order'];
        // echo $delete_id;

        // delete query
        $delete_query = "DELETE FROM user_orders WHERE order_id = $delete_id";
        $run_delete_query = mysqli_query($conn, $delete_query);
        if($run_delete_query){
            echo "<script>alert('Order Deleted Successfully')</script>";
            echo "<script>window.open('adminPanel.php?list_orders', '_self')</script>";
        }


    }
?>  