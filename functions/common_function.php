<?php

    // including connect file
    include("../includes/connect.php");


    // getting products in home page
    function getproducts(){
        global $conn;        
        $select_query = "SELECT * FROM products ORDER BY rand() LIMIT 0,9";
        $result_query = mysqli_query($conn, $select_query);
       
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
            <div class='card shadow-hover'>
              <img src='../Admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description.</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='../home/index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";
          }
        }
     

    // gettig products in men's page
    function get_men_products(){
        global $conn;
        // checking if category or brands is set or not
        if(!isset($_GET['category'])){
          if(!isset($_GET['brand'])){
        $select_query = "SELECT * FROM products WHERE gender='male' ORDER BY rand()";
        $result_query = mysqli_query($conn, $select_query);
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img src='../Admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description.</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='../home/index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='../home/product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
            </div>
        </div>";
        }
      }
    }
  }

  // getting unique categories
    function get_unique_categories(){
      global $conn;
      // checking if category or brands is set or not
      if(isset($_GET['category'])){
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM products WHERE gender='male' and category_id = $category_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
          echo "<h2 class='text-center text-danger'>Sorry!! No stock for this category</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img src='../Admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description.</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='../home/index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='../home/product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
            </div>
        </div>";
        }
      }
    }

     // getting unique brands
     function get_unique_brands(){
      global $conn;
      // checking if category or brands is set or not
      if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM products WHERE gender='male' and brand_id = $brand_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
          echo "<h2 class='text-center text-danger'>Sorry!! Out of Stock</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img src='../Admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description.</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='../home/index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='../home/product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
            </div>
        </div>";
        }
      }
    }
  

    // getting products of women in women's page
    function get_women_products(){
        global $conn;
        if(!isset($_GET['category'])){
          if(!isset($_GET['brand'])){
            $select_query = "SELECT * FROM products WHERE gender='female' ORDER BY rand()";
            $result_query = mysqli_query($conn, $select_query);

            while($row=mysqli_fetch_assoc($result_query)){
              $product_id = $row['product_id'];
              $product_title = $row['product_title'];
              $product_description = $row['product_description'];
              $product_image1 = $row['product_image1'];
              $product_price = $row['product_price'];
              $category_id = $row['category_id'];
              $brand_id = $row['brand_id'];
              echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='../Admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description.</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='../home/index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='../home/product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                  </div>
                </div>
              </div>";
            }
        }
      }
    }
    
     // getting unique categories
     function get_unique_categories_women(){
      global $conn;
      // checking if category or brands is set or not
      if(isset($_GET['category'])){
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM products WHERE gender='female' AND category_id = $category_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
          echo "<h2 class='text-center text-danger'>Sorry!! No stock for this category</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img src='../Admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description.</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='../home/index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='../home/product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
            </div>
        </div>";
        }
      }
    }

     // getting unique brands
     function get_unique_brands_women(){
      global $conn;
      // checking if category or brands is set or not
      if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM products WHERE gender='female' and brand_id = $brand_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
          echo "<h2 class='text-center text-danger'>Sorry!! Out of Stock</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img src='../Admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description.</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='../home/index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='../home/product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
            </div>
        </div>";
        }
      }
    }

    // searching product function
    function search_product(){
      global $conn;
      
      if(isset($_GET['search_data_product'])){
        $search_data_value = $_GET['search_data'];

        
        $search_query = "SELECT * FROM products WHERE product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($conn, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
          echo "<h2 class='text-center text-danger'>No results match</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img src='../Admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description.</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='../home/index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='../home/product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
            </div>
        </div>";
        }
      }
    }

     // searching product function in men's page
     function search_product_men(){
      global $conn;
      
      if(isset($_GET['search_data_product'])){
        $search_data_value = $_GET['search_data'];

        
        $search_query = "SELECT * FROM products WHERE gender='male' AND  product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($conn, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
          echo "<h2 class='text-center text-danger'>No results match</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img src='../Admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description.</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='../home/index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='../home/product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
            </div>
        </div>";
        }
      }
    }

    // searching product function in women's page
    function search_product_women(){
      global $conn;
      
      if(isset($_GET['search_data_product'])){
        $search_data_value = $_GET['search_data'];

        
        $search_query = "SELECT * FROM products WHERE gender='female' AND  product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($conn, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
          echo "<h2 class='text-center text-danger'>No results match</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img src='../Admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description.</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='../home/index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='../home/product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
            </div>
        </div>";
        }
      }
    }


    // view details function
    function view_details(){
        global $conn;
        if(isset($_GET['product_id'])){
        // checking if category or brands is set or not
          if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
              $product_id = $_GET['product_id'];
              $select_query = "SELECT * FROM products WHERE product_id = $product_id";
              $result_query = mysqli_query($conn, $select_query);
              while($row=mysqli_fetch_assoc($result_query)){
              $product_id = $row['product_id'];
              $product_title = $row['product_title'];
              $product_description = $row['product_description'];
              $product_image1 = $row['product_image1'];
              $product_image2 = $row['product_image2'];
              $product_image3 = $row['product_image3'];
              $product_price = $row['product_price'];
              $category_id = $row['category_id'];
              $brand_id = $row['brand_id'];
              echo "<div class='col-md-4 mb-2'>
                  <div class='card'>
                  <img src='../Admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: $product_price/-</p>
                      <a href='../home/index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                      <a href='../home/index.php' class='btn btn-secondary'>Go Home</a>
                  </div>
                  </div>
              </div>
              <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>
                            Related Products
                        </h4>
                    </div>
                    <div class='col-md-6 wrapper'>
                        <img src='../Admin_Area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                    </div>
                    <div class='col-md-6 wrapper'>
                        <img src='../Admin_Area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                    </div>
                </div>
                
            </div>";
            }
          }
        }  
      }
    }
        

    // get ip address function
    function getIPAddress() {  
      //whether ip is from the share internet  
      if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
      //whether ip is from the proxy  
      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
      }  
     //whether ip is from the remote address  
      else{  
        $ip = $_SERVER['REMOTE_ADDR'];  
       }  
       return $ip;  
    }  
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip; 


    // cart function

    // function cart(){
    //   if(isset($_GET['add_to_cart'])){
    //     global $conn;
    //     $get_ip_address = getIPAddress();
    //     $get_product_id = $_GET['add_to_cart'];
    //     $select_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address' AND product_id = $get_product_id";
    //     $result_query = mysqli_query($conn, $select_query);
    //     $num_of_rows = mysqli_num_rows($result_query);
    //     if($num_of_rows > 0){
    //       echo "<script>alert('This item is already present in your cart')</script>";
    //       echo "<script>window.open('index.php', '_self')</script>";
    //     }else{
    //       $select = "SELECT * FROM products WHERE product_id = $get_product_id";
    //       $execute = mysqli_query($conn, $select);
    //       $row_data = mysqli_fetch_assoc($execute);
    //       $product_price = $row_data['product_price'];

    //       // // new
    //       // if(isset($_SESSION['username'])){
    //       //   $username = $_SESSION['username'];
    //       // }

    //       // $select_userid = "SELECT * FROM user_table WHERE user_name = '$username'";
    //       // $run_select_userid = mysqli_query($conn, $select_userid);
    //       // if(mysqli_num_rows($run_select_userid)>0){
    //       //   $data_userid = mysqli_fetch_assoc($run_select_userid);
    //       //   $user_id = $data_userid['user_id'];
    //       //   // echo $user_id;
    //       // }
    //       // // new closed

    //       $insert_query = "INSERT INTO cart_details(product_id, ip_address, quantity, product_size, total_amount)VALUES($get_product_id, '$get_ip_address',1, 'medium', $product_price)";
    //       $result_query = mysqli_query($conn, $insert_query);
    //       echo "<script>alert('Item is added to your cart')</script>";
    //       echo "<script>window.open('index.php', '_self')</script>";
    //     }
    //   }
    // }

    function cart() {
      if (isset($_GET['add_to_cart'])) {
          global $conn;
          $get_product_id = $_GET['add_to_cart'];
  
          // Retrieve product details from your product list (you might need to fetch this from your database)
          // $product_price = 100; // Replace with the actual product price
          // $product_name = 'Sample Product'; // Replace with the actual product name

          $select = "SELECT * FROM products WHERE product_id = $get_product_id";
          $execute = mysqli_query($conn, $select);
          $row_data = mysqli_fetch_assoc($execute);
          $product_price = $row_data['product_price'];
          $product_name = $row_data['product_title'];
          $productImg = $row_data['product_image1'];


          if (!isset($_SESSION['cart'])) {
              $_SESSION['cart'] = [];
          }
  
          // Check if the product is already in the cart
          if (isset($_SESSION['cart'][$get_product_id])) {
              echo "<script>alert('This item is already present in your cart')</script>";
              echo "<script>window.open('index.php', '_self')</script>";
          } else {
              // Add product to the cart session
              $_SESSION['cart'][$get_product_id] = [
                  'product_id' => $get_product_id,
                  'product_name' => $product_name,
                  'product_image1' => $productImg,
                  'product_price' => $product_price,
                  'quantity' => 1, // You can set the initial quantity here
                  'product_size' => 'medium' // You can set the initial size here
              ];
  
              echo "<script>alert('Item is added to your cart')</script>";
              echo "<script>window.open('index.php', '_self')</script>";
          }
      }
  }
  
 

  


    // function to get cart item numbers
    function cart_item() {
      if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
          $count_cart_items = count($_SESSION['cart']);
      } else {
          $count_cart_items = 0;
      }
      echo $count_cart_items;
  }
  




    // total price function
    function total_cart_price() {
      $total_price = 0;
  
      if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $product_id => $item) {
              $product_price = $item['product_price'];
              $product_quantity = $item['quantity'];
              $product_total_price = $product_price * $product_quantity;
              $total_price += $product_total_price;
          }
      }
  
      echo "Rs. " . $total_price . "/-";
  }
  

    //get user order details
    function get_user_order_details(){
      global $conn;
      $username = $_SESSION['username'];
      
      $get_details = "SELECT * FROM user_table WHERE user_name = '$username'";
      $result_query = mysqli_query($conn, $get_details);
      while($row_query = mysqli_fetch_array($result_query)){
        $user_id = $row_query['user_id'];
        
        if(!isset($_GET['edit_account'])){
          if(!isset($_GET['my_orders'])){
            if(!isset($_GET['delete_account'])){
              $get_orders = "SELECT * FROM user_orders WHERE user_id = $user_id AND order_status = 'Pending'";
              $result_order_query = mysqli_query($conn, $get_orders);
              $row_count = mysqli_num_rows($result_order_query); 
              if($row_count > 0){
                echo "<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>View Order Details</a></p>";
              }else{
                echo "<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-danger'>0</span> pending orders</h3>
                <p class='text-center'><a href='../home/index.php' class='text-dark'>Explore Products</a></p>";
              }


            }
          }
        }
      }
    }



    function dashboard(){
      global $conn;
      $total_sold = 0;
      $get_count = "SELECT * FROM orders_pending WHERE isVerified = 'true'";
      $execute_query = mysqli_query($conn, $get_count);
      $rows_count = mysqli_num_rows($execute_query);


      $get_products = "SELECT * FROM products";
      $result = mysqli_query($conn, $get_products);
      $row_counts = mysqli_num_rows($result);


      $select_query = "SELECT * FROM brands";
      $run = mysqli_query($conn, $select_query);
      $count_brands = mysqli_num_rows($run);


      $select_category = "SELECT * FROM categories";
      $runn = mysqli_query($conn, $select_category);
      $count_category = mysqli_num_rows($runn);


      $get_orders = "SELECT * FROM user_orders";
      $result = mysqli_query($conn, $get_orders);
      $row = mysqli_num_rows($result);

      $tot_users = "SELECT * FROM user_table";
      $exe = mysqli_query($conn, $tot_users);
      $count_user = mysqli_num_rows($exe);
      
    
      echo "
      <div class='container-fluid bg-light'>
        <div id='dashboard-div' class=''>
                
            <h4 id='tot-sold'>Total Items Sold</h4>
            <div id='dash-div'>
            <h4 style='text-align: center; font-size: 30px;'>$rows_count</h4>
            </div>                                                                    
            
          </div>
        <div id='dashboard-div1' class=''>
            <h4 id='tot-sold'>Total Products</h4>
            <div id='dash-div'>
            <h4 style='text-align: center; font-size: 30px;'>$row_counts</h4>
            </div>

        </div>
        <div id='dashboard-div2' class=''>
            <h4 id='tot-sold'>Total Brands</h4>
            <div id='dash-div'>
            <h4 style='text-align: center; font-size: 30px;'>$count_brands</h4>
            </div>

        </div>
        <div id='dashboard-div3' class=''>
            <h4 id='tot-sold'>Total Category</h4>
            <div id='dash-div'>
            <h4 style='text-align: center; font-size: 30px;'>$count_category</h4>
            </div>
            
        </div>

        <div id='dashboard-div4' class=''>
            <h4 id='tot-sold'>Total Order</h4>
            <div id='dash-div'>
            <h4 style='text-align: center; font-size: 30px;'>$row</h4>
            </div>
        </div>

        <div id='dashboard-div5' class=''>
            <h4 id='tot-sold'>Total Users</h4>
            <div id='dash-div'>
            <h4 style='text-align: center; font-size: 30px;'>$count_user</h4>
            </div>
        </div>
        
                                                                                                                    
        </div>  
      ";
    }


    function userMessage () {
      global $conn;
      $msg = "SELECT * FROM contact_us_table";
      $exe = mysqli_query($conn, $msg);
      $count = mysqli_num_rows($exe);
      echo $count;
      
    }
    function userOrder () {
      global $conn;
      $msg = "SELECT * FROM user_orders";
      $exe = mysqli_query($conn, $msg);
      $count = mysqli_num_rows($exe);
      echo $count;
      
    }
    function userList () {
      global $conn;
      $msg = "SELECT * FROM user_table";
      $exe = mysqli_query($conn, $msg);
      $count = mysqli_num_rows($exe);
      echo $count;
      
    }



?>



