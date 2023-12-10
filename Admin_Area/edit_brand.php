<?php
    if(isset($_GET['edit_brand'])){
        $edit_brand = $_GET['edit_brand'];
        // echo $edit_brand;
        
        // select query
        $get_brands = "SELECT * FROM brands WHERE brand_id = $edit_brand";
        $result = mysqli_query($conn, $get_brands);
        $row = mysqli_fetch_assoc($result);
        $brand_title = $row['brand_title'];
        // echo $brand_title;
    }

    
    if(isset($_POST['update_brand'])){
        $brand_title_new = $_POST['brand_title'];
        
        // update query
        $update_brand = "UPDATE brands set brand_title = '$brand_title_new' WHERE brand_id = $edit_brand";
        $run_update_category = mysqli_query($conn, $update_brand);
        if($run_update_category){
            echo "<script>alert('Brand Updated Successfully')</script>";
            echo "<script>window.open('adminPanel.php?view_brands', '_self')</script>";
        }
    }
?>

<div class="container mt-3">
    <h2 class="text-center">Edit Brand</h2>
    <form action="" method="POST" class="w-50 m-auto">
        <div class="form-outline mb-4">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" value="<?php echo $brand_title; ?>" id="brand_title" class="form-control" required="required">
        </div>
        
        <input type="submit" value="Update Brand" name="update_brand" class="btn btn-info px-3 mb-4 border-0">
    </form>
</div>

