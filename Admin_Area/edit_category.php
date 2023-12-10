<?php
    if(isset($_GET['edit_category'])){
        $edit_category = $_GET['edit_category'];
        // echo $edit_category;
        
        // select query
        $get_categories = "SELECT * FROM categories WHERE category_id = $edit_category";
        $result = mysqli_query($conn, $get_categories);
        $row = mysqli_fetch_assoc($result);
        $category_title = $row['category_title'];
        // echo $category_title;
    }

    if(isset($_POST['edit_cat'])){
        $cat_title = $_POST['category_title'];
        
        // update query
        $update_category = "UPDATE categories set category_title = '$cat_title' WHERE category_id = $edit_category";
        $run_update_category = mysqli_query($conn, $update_category);
        if($run_update_category){
            echo "<script>alert('Category Updated Successfully')</script>";
            echo "<script>window.open('adminPanel.php?view_categories', '_self')</script>";
        }
    }
?>

<div class="container mt-3">
    <h2 class="text-center">Edit Category</h2>
    <form action="" method="POST" class="w-50 m-auto">
        <div class="form-outline mb-4">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" value="<?php echo $category_title; ?>" id="category_title" class="form-control" required="required">
        </div>
        
        <input type="submit" value="Update Category" name="edit_cat" class="btn btn-info px-3 mb-4 border-0">
    </form>
</div>

