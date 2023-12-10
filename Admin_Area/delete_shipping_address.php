<?php
    include('../includes/connect.php');
    if(isset($_GET['invoice_number'])){
        $invoice_number = $_GET['invoice_number'];

        $delete = "DELETE FROM shipping_address WHERE invoice_number = $invoice_number";
        $run = mysqli_query($conn, $delete);
        if($run){
            echo "<script>alert('Delete successsfully!')</script>";
            echo "<script>window.open('adminPanel.php?shipping_address','_self')</script>";
        }
    }
?>