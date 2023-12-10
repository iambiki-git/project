<?php
    if(isset($_GET['delete_brand'])){
        $delete_brand_id = $_GET['delete_brand'];
        // echo $delete_id;

        // delete query
        $delete_query = "DELETE FROM brands WHERE brand_id = $delete_brand_id";
        $run_delete_query = mysqli_query($conn, $delete_query);
        if($run_delete_query){
            echo "<script>alert('Brand Deleted Successfully')</script>";
            echo "<script>window.open('adminPanel.php?view_brands', '_self')</script>";
        }


    }
?>