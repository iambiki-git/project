<?php
    if(isset($_GET['edit_products'])){
        $edit_id = $_GET['edit_products'];
        // echo $edit_id;

        $select_query = "SELECT * FROM products WHERE product_id = $edit_id";
        $result = mysqli_query($conn, $select_query);
        $row = mysqli_fetch_assoc($result);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keyword = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];
        $gender_for_product = $row['gender'];   
        
        
        // fetching categories 
        $get_categories = "SELECT * FROM categories WHERE category_id = $category_id";
        $run_get_categories = mysqli_query($conn, $get_categories);
        $row_category = mysqli_fetch_assoc($run_get_categories);
        $category_title = $row_category['category_title'];
           

          
        // fetching brands 
        $get_brands = "SELECT * FROM brands WHERE brand_id = $brand_id";
        $run_get_brands = mysqli_query($conn, $get_brands);
        $row_brand = mysqli_fetch_assoc($run_get_brands);
        $brand_title = $row_brand['brand_title'];    
    }



?>
<div class="container mt-5">
    <h1 class="text-center text-warning">Edit Product</h1>
    <form action="" method="POST" enctype="multipart/form-data" novalidate>
        <div class="form-outline w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" class="form-control mb-4" name="product_title" value="<?php echo  $product_title; ?>" required="required">
        </div>

        <div class="form-outline w-50 m-auto">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" value="<?php echo  $product_description; ?>" class="form-control mb-4" name="product_description" required="required">
        </div>

        <div class="form-outline w-50 m-auto">
            <label for="product_keyword" class="form-label">Product Keyword</label>
            <input type="text" id="product_keyword" value="<?php echo  $product_keyword; ?>" class="form-control mb-4" name="product_keyword" required="required">
        </div>

        <div class="form-outline w-50 m-auto">
            <label for="product_category" class="form-label">Product Category</label>
            <select name="product_category" class="form-select d-block mb-4" style="width:100%; height:40px; border-radius:3px;">
                <option value="<?php echo $category_title; ?>"><?php echo $category_title; ?></option>
                <?php 
                     // fetching remaining categories 
                    $get_categories_all = "SELECT * FROM categories";
                    $run_get_categories_all = mysqli_query($conn, $get_categories_all);
                    while($row_category_all = mysqli_fetch_assoc($run_get_categories_all)){
                        $category_title = $row_category_all['category_title'];
                        $category_id = $row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    } 
                ?>
            </select>
        </div>

        <div class="form-outline w-50 m-auto">
            <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brand" class="form-select d-block mb-4" style="width:100%; height:40px; border-radius:3px;">
                <option value="<?php echo $brand_title; ?>"><?php echo $brand_title; ?></option>
                <?php 
                     // fetching remaining brands 
                    $get_brands_all = "SELECT * FROM brands";
                    $run_get_brands_all = mysqli_query($conn, $get_brands_all);
                    while($row_brands_all = mysqli_fetch_assoc($run_get_brands_all)){
                        $brand_title = $row_brands_all['brand_title'];
                        $brand_id = $row_brands_all['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    } 
                ?>
            </select>
        </div>

        <div class="form-outline w-50 m-auto">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
                <input type="file" id="product_image1" class="form-control mb-4 w-90 m-auto" name="product_image1" required="required">
                <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="edit_image">
            </div>
        </div>

        <div class="form-outline w-50 m-auto">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
                <input type="file" id="product_image2" class="form-control mb-4 w-90 m-auto" name="product_image2" required="required">
                <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="edit_image">
            </div>
        </div>

        <div class="form-outline w-50 m-auto">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
                <input type="file" id="product_image3" class="form-control mb-4 w-90 m-auto" name="product_image3" required="required">
                <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="edit_image">
            </div>
        </div>

        <div class="form-outline w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" value="<?php echo  $product_price; ?>" class="form-control mb-4" name="product_price" required="required">
        </div>

        <div class="form-outline w-50 m-auto">
            <label for="product_gender" class="form-label">Product Gender</label>
            <input type="text" id="product_gender" value="<?php echo $gender_for_product; ?>" class="form-control mb-4" name="product_gender" required="required">
        </div>

        <div class="w-50 m-auto">
            <input type="submit" class="btn btn-success px-3 mb-3" value="Update Product" name="edit_product">
        </div>
    </form>
</div>

<!-- query to save updated products -->
<?php
    if(isset($_POST['edit_product'])){
       $product_title = $_POST['product_title']; 
       $product_description = $_POST['product_description']; 
       $product_keyword = $_POST['product_keyword']; 
       $product_category = $_POST['product_category']; 
       $product_brand = $_POST['product_brand']; 
       $product_price = $_POST['product_price']; 
       $product_gender = $_POST['product_gender']; 


       $product_image1 = $_FILES['product_image1']['name']; 
       $product_image2 = $_FILES['product_image2']['name']; 
       $product_image3 = $_FILES['product_image3']['name'];

       $tmp_image1 = $_FILES['product_image1']['tmp_name']; 
       $tmp_image2 = $_FILES['product_image2']['tmp_name']; 
       $tmp_image3 = $_FILES['product_image3']['tmp_name'];

      


       // checking fields either empty or not
       if($product_title == '' or $product_description == '' or $product_keyword == '' or $product_category == '' 
       or $product_brand == '' or $product_price == '' or $product_gender == '' or $product_image1 == '' or $product_image2 == ''
       or $product_image3 == ''){
        echo "<script>alert('Please fill all the fields')</script>";
       }else{
        // moving images to folder 
        move_uploaded_file($tmp_image1, './product_images/$product_image1');
        move_uploaded_file($tmp_image2, './product_images/$product_image2');
        move_uploaded_file($tmp_image3, './product_images/$product_image3');

         // update products query 
        $update_query = "UPDATE products set product_title ='$product_title', product_description = '$product_description', 
        product_keywords = '$product_keyword', category_id = '$product_category', brand_id = '$product_brand', 
        product_price = '$product_price', gender = '$product_gender', product_image1 = '$product_image1', 
        product_image2 = '$product_image2', product_image3 = '$product_image3', date = NOW() WHERE product_id = $edit_id";
        $run_update_query = mysqli_query($conn, $update_query);
        if($run_update_query){
            echo "<script>alert('Product Updated Successfully')</script>";
            echo "<script>window.open('./insert_product.php', '_self')</script>";
        }

       }
    }
?>
