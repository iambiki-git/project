<?php

    include('../includes/connect.php');

    if(isset($_POST['insert_product'])){
        $product_title = $_POST['product_title'];
        $description = $_POST['description'];
        $product_keyword = $_POST['product_keywords'];
        $product_category = $_POST['product_category'];
        $product_brands = $_POST['product_brands'];
        $product_price = $_POST['product_price'];
        $product_gender = $_POST['product_gender'];
        $product_status = 'true';

        // accessing images
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        // accessing image temp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        // checking empty condition
        if( $product_title=='' or $description=='' or $product_keyword=='' or $product_category=='' 
        or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' 
        or $product_image3=='' or $product_gender==''){
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
            move_uploaded_file($temp_image3, "./product_images/$product_image3");

            // insert query
            $insert_products = "INSERT INTO products(product_title, product_description, 
            product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, 
            product_price, date, status, gender)VALUES('$product_title', '$description', '$product_keyword',
            '$product_category', '$product_brands', '$product_image1', '$product_image2', '$product_image3',
            '$product_price', NOW(), '$product_status', '$product_gender')";

            $result_query = mysqli_query($conn, $insert_products);
            if($result_query){
                echo "<script>alert('Successfully inserted the products')</script>";
                echo "<script>window.open('./adminPanel.php', '_self')</script>";
            }
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <!-- font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>

     <link rel="stylesheet" href="../style.css">

     
</head>
<body class="bg-dark">
<button type="button" class="btn btn-secondary m-2 px-4 border-0"><a href="adminPanel.php" class="text-light"><i class="fa fa-arrow-left"></i></a></button>

    <div class="container mt-3">
        <h1 class="text-center text-light">Insert Products</h1>
        <!-- form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- product-title -->
            <div class="form-outline w-50 m-auto">
                <label for="product_title" class="form-label text-light">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control  mb-3" placeholder="Enter product title" autocomplete="off" required="required">
                
            </div>

            <!-- product_description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label text-light">Product description</label>
                <input type="text" name="description" id="description" class="form-control mb-3" placeholder="Enter product description" autocomplete="off" required="required">
                
            </div>

             <!-- product_keywords -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label text-light">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control mb-3" placeholder="Enter product keywords" autocomplete="off" required="required">
                
            </div>

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
               <select name="product_category" id="" class="form-control mb-3">
                    <option value="">Select category</option>
                    <?php

                        $select_query = "select * from categories";
                        $result_query = mysqli_query($conn, $select_query);
                        while($row = mysqli_fetch_assoc($result_query)){
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }

                    ?>
                    
                    <!-- <option value="">Category 2</option>
                    <option value="">Category 3</option>
                    <option value="">Category 4</option> -->
               </select>
            </div>

             <!-- Brands -->
             <div class="form-outline w-50 mx-auto">
               <select name="product_brands" id="" class="form-control mb-3">
                    <option value="">Select brands</option>
                    <?php

                        $select_query = "select * from brands";
                        $result_query = mysqli_query($conn, $select_query);
                        while($row = mysqli_fetch_assoc($result_query)){
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];
                            echo " <option value='$brand_id'>$brand_title</option>";
                        }

                    ?>
                   
                    <!-- <option value="">Brands 2</option>
                    <option value="">Brands 3</option>
                    <option value="">Brands 4</option> -->
               </select>
            </div>

              <!-- Images 1 -->
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label text-light">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control mb-3" required="required">
            </div>

             <!-- Images 2 -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label text-light">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control mb-3" required="required">
            </div>

             <!-- Images 3 -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label text-light">Product image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control mb-3" required="required">
            </div>

             <!-- price -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label text-light">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control mb-3" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

             <!-- gender -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_gender" class="form-label text-light">product_gender</label>
                <input type="text" name="product_gender" id="product_gender" class="form-control mb-3" placeholder="Enter product gender" autocomplete="off" required="required">
            </div>

            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto">
               <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>

        </form>
    </div>
    
</body>
</html>