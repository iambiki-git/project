<?php

    include('../includes/connect.php');





    if(isset($_POST['insert_cat'])){
        $category_title = $_POST['cat_title'];
        $gender = $_POST['cat_gender'];

        // select data from database
        $select_query = "SELECT * FROM categories WHERE category_title = '$category_title'";
        $result_select = mysqli_query($conn, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number > 0){
            echo "<script>alert('Already in database')</script>";
        }else{
            $insert_query = "INSERT INTO categories(category_title, gender)VALUES('$category_title', '$gender')";
            $result = mysqli_query($conn, $insert_query);
    
            if($result){
                echo "<script>alert('Category has been inserted successfully')</script>";
            }
        }
    }
    
?>

<h2 class="text-center mt-4">Insert Categories</h2>
<form action="" method="POST" class="mb-2 w-50 m-auto">
    <div class="input-group w-90 mb-3 mt-4">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa fa-file"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="categories" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa fa-file"></i></span>
        <input type="text" class="form-control" name="cat_gender" placeholder="Insert gender" aria-label="categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="btn btn-info border-0 p-2 my-3" name="insert_cat" value="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    
</form>