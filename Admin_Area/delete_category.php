<?php
    if(isset($_GET['delete_category'])){
        $delete_id = $_GET['delete_category'];
        // echo $delete_id;

        // delete query
        $delete_query = "DELETE FROM categories WHERE category_id = $delete_id";
        $run_delete_query = mysqli_query($conn, $delete_query);
        if($run_delete_query){
            echo "<script>alert('Category Deleted Successfully')</script>";
            echo "<script>window.open('adminPanel.php?view_categories', '_self')</script>";
        }


    }
?>