



<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details from the database based on product_id
    $select_product = "SELECT * FROM products WHERE product_id = $product_id";
    $result_product = mysqli_query($conn, $select_product);
    $row_product = mysqli_fetch_assoc($result_product);

    if ($row_product) {
        if (isset($_POST['update'])) {
            $new_quantity = $_POST['qty'];
            $new_size = $_POST['size'];

            // Update the session data for the product with new quantity and size
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity'] = $new_quantity;
                $_SESSION['cart'][$product_id]['product_size'] = $new_size;
            }

            // Redirect back to cart page
            header("Location: cart.php");
            exit();
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- ... (head content) ... -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>eCommerce Website</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- font awesome link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>



    <link rel="stylesheet" href="../style.css">

    <style>
      /* .navbar-nav .nav-item .nav-link{
          font-family: cursive; 
          letter-spacing:2px;
        } */
      /* .navbar-nav .nav-item .nav-link:hover {
        color: whitesmoke;
        text-decoration: underline;
      } */
     
     body{
      overflow-x:hidden;
     }
     /* .mydiv{
      height: 100px;
     } */
     
     .myclothinglogo{
      object-fit:contain;
      height: 120px;
      width: 120px;
      background-color: transparent;
     }
     .mylink{
      font-size: 19px;
     
     }
     .product_image{
        height: 120px;
        width: 120px;
        object-fit: contain;
     }
     
      
    </style>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- ... (navbar and other HTML content) ... -->
     <!-- navbar -->
     <div class="p-0">
      <!-- first-child -->
      
      <nav class="navbar navbar-expand-lg bg-info navbar-light">
      <div class="container-fluid mydiv">
        <img src="../images/newproject.png" alt="clothing store logo" class="myclothinglogo">

        <!-- for small screen button appear for option -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- !for small screen button appear for option -->
        <div class="collapse navbar-collapse container" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mx-5 mylink">
            <li class="nav-item">
              <a class="nav-link  active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Category_men_women/men_page.php">Men</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Category_men_women/female_page.php">Women</a>
            </li>
            <?php
              if(isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='../users_area/profile.php'>My Account</a>
              </li>";
              }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='../users_area/user_registration.php'>Register</a>
              </li>";
              }

            ?>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact Us</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup class="text-danger font-weight-bold"><?php cart_item();  ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?></a>
            </li>
            
          </ul>
          <form class="d-flex" role="search" action="index.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>



    <!-- calling cart function -->
    <?php
      cart();
    ?>

    <!-- second-child -->
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
      <ul class="navbar-nav me-auto"> 
       
        <?php
          if(!isset($_SESSION['username'])){
            echo " <li class='nav-item'>
            <a class='nav-link' href='#'>Welcome Guest</a>
          </li>";
          }else{
            echo " <li class='nav-item'>
            <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
          </li>";
          }
          
          if(!isset($_SESSION['username'])){
            echo " <li class=nav-item>
            
            <a class=nav-link href='../users_area/user_login.php'>Signin</a>
          </li>";
          }else{
            echo " <li class='nav-item'>
            
            <a class='nav-link' href='../users_area/logout.php'>Signout</a>
          </li>";
          }
        ?>
      </ul>
    </nav>

    <div class="container-fluid">
        <div class="bg-light my-4">
            <p class="text-center text-dark font-weight-bold">"Fashion made easy. Shop online, dress with confidence."</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center text-success">Edit Product</h3>
                    <form action="" method="POST">
                        <table class="table table-bordered">
                            <thead class="text-center text-dark">
                                <tr>
                                    <th>Title</th>
                                    <th>Product Image</th>
                                    <th>Product Price</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['product_id'])) {
                                    $product_id = $_GET['product_id'];
                                }
                                // select query
                                $select_query = "SELECT * FROM products WHERE product_id = $product_id";
                                $run_query = mysqli_query($conn, $select_query);
                                $row_data = mysqli_fetch_assoc($run_query);
                                $product_title = $row_data['product_title'];
                                $product_image1 = $row_data['product_image1'];
                                $product_price = $row_data['product_price'];
                                echo "<tr class='text-center'>
                                <td>$product_title</td>
                                <td><img src='../Admin_Area/product_images/$product_image1' alt='product_img' class='product_image'/></td>
                                <td>$product_price</td>
                                <td><input type='text' name='qty' class='form-input' value='{$_SESSION['cart'][$product_id]['quantity']}'></td>
                                <td>
                                    <select name='size' id=''>
                                        <option name='size' value='small'>Small</option>
                                        <option name='size' value='medium'>Medium</option>
                                        <option name='size' value='large'>Large</option>
                                        <option name='size' value='extra_large'>Extra Large</option>
                                    </select>
                                </td>
                                </tr>";
                                ?>
                            </tbody>
                        </table>
                        <input type="submit" value="Update Product" class="btn btn-primary border-0 text-light" name="update">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ... (footer and script tags) ... -->
     <!-- last child -->
    <!-- footer -->
    <?php
     
      include('../includes/footer.php');
      
    ?>
     


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
