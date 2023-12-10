<?php
    if(isset($_GET['delete_payment'])){
        $delete_id = $_GET['delete_payment'];
        // echo $delete_id;

        // delete query
        $delete_query = "DELETE FROM user_payments WHERE payment_id = $delete_id";
        $run_delete_query = mysqli_query($conn, $delete_query);
        if($run_delete_query){
            echo "<script>alert('Payment Deleted Successfully')</script>";
            echo "<script>window.open('adminPanel.php?payment_list', '_self')</script>";
        }


    }
?>  