<?php
    if(isset($_GET['delete_product'])){
        $delete_id = $_GET['delete_product'];
        // echo $delete_id;

        // delete query
        $delete_query = "DELETE FROM products WHERE product_id = $delete_id";
        $run_delete_query = mysqli_query($conn, $delete_query);
        if($run_delete_query){
            echo "<script>alert('Product Deleted Successfully')</script>";
            echo "<script>window.open('./adminPanel.php', '_self')</script>";
        }


    }
?>