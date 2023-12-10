<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

// Function to remove cart item
function removeCartItem($product_id) {
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Handle remove item
if (isset($_POST['removeitem']) && is_array($_POST['removeitem'])) {
    foreach ($_POST['removeitem'] as $product_id) {
        removeCartItem($product_id);
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
  <title>Cart Details</title>
  <!-- bootstrap link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>


  <link rel="stylesheet" href="../style.css">
  
  <style>
    .cart_img {
      width: 140px;
      height: 140px;
      object-fit: contain;
    }

    /* .navbar-nav .nav-item .nav-link {

      font-family: cursive;
      letter-spacing: 2px;
    } */

    .navbar-nav .nav-item .nav-link:hover {
      color: whitesmoke;
      text-decoration: underline;
    }

    body {
      overflow-x: hidden;
    }
    .mydiv{
      height: 70px;
     }
     .myclothinglogo{
      object-fit:contain;
      height: 120px;
      width: 120px;
      background-color: transparent;
     }
     .mylink{
      font-size: 19px;
     
     }

  </style>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
    <!-- ... (navbar and other HTML content) ... -->
    <div class=" p-0">
  <!-- first-child -->
  <nav class="navbar navbar-expand-lg bg-info navbar-light">
    <div class="container-fluid mydiv">
    <img src="../images/newproject.png" alt="clothing store logo" class="myclothinglogo">
      <!-- for small screen button appear for option -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- !for small screen button appear for option -->
      <div class="collapse navbar-collapse container" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mylink">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Category_men_women/men_page.php">Men</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Category_men_women/female_page.php">Women</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../users_area/user_registration.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup class="text-danger font-weight-bold"><?php cart_item(); ?></sup></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <?php
  cart();
  ?>

   <!-- second-child -->
   <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
    <ul class="navbar-nav me-auto">

      <?php
      if (!isset($_SESSION['username'])) {
        echo " <li class='nav-item'>
            <a class='nav-link' href='#'>Welcome Guest</a>
          </li>";
      } else {
        echo " <li class='nav-item'>
            <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
          </li>";
      }

      if (!isset($_SESSION['username'])) {
        echo " <li class=nav-item>
            <a class=nav-link href='../users_area/user_login.php'>Signin</a>
          </li>";
      } else {
        echo " <li class='nav-item'>
        <a href='../users_area/logout.php' class='nav link signout'>
        <i class='fa-solid fa-right-from-bracket'></i></a></li>";
      }
      ?>
    </ul>
  </nav>


    <div class="container">
    <div class="bg-light my-4">
      <!-- <h3 class="text-center">Clothing Store</h3> -->
      <h2 class="text-center text-dark font-weight-bold">"Cart Details"</h2>
    </div>
  </div>



    <div class="container">
        <div class="row">
            <form action="" method="POST">
              <?php
               if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                  // cart is not empty, so display the table
                ?>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Size</th> 
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        $total_price = 0;

                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                          foreach ($_SESSION['cart'] as $product_id => $item) {
                            // Fetch product details from the database based on product_id
                            $select_product = "SELECT product_title, product_image1 FROM products WHERE product_id = $product_id";
                            $result_product = mysqli_query($conn, $select_product);
                            $row_product = mysqli_fetch_assoc($result_product);
                        
                            $product_title = $row_product['product_title'];
                            $product_image = $row_product['product_image1']; // Actual image file name
                            $product_quantity = $item['quantity'];
                            $product_size = $item['product_size'];
                            $product_total_price = $item['product_price'] * $product_quantity;
                            $total_price += $product_total_price;
                            ?>

                                <tr>
                                    <td><?php echo $product_title ?></td>
                                    <td><img src="../Admin_Area/product_images/<?php echo $product_image ?>" alt="" class="cart_img"></td>
                                    <td><?php echo $product_quantity; ?></td>
                                    <td><?php echo $product_size; ?> </td>
                                    <td><?php echo "Rs. " . $product_total_price ?>/-</td>
                                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                    <td class="d-flex">
                                        <a href="./edit_single_product.php?product_id=<?php echo $product_id; ?>" class="bg-warning px-3 py-2 mx-3 border-0 text-dark text-decoration-none">Edit Product</a>
                                        <input type="submit" value="Remove" class="bg-danger px-3 py-2 border-0 text-light" name="remove_cart">
                                    </td>
                                </tr>
                            <?php
                            }
                          }
                        } else {
                            echo "<h3 class='text-danger text-center'>Your cart is empty</h3>";
                        }
                        ?>
                        
                    </tbody>
                </table>
              
                        
                <!-- ... (subtotal and checkout buttons) ... -->
                <div class="d-flex mb-3">
                <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $delivery_cost = 100; // Example delivery cost
        $subTotal = $total_price + $delivery_cost;

        echo "<h5 class='text-dark mx-3 display-block'>Delivery Charge: <span class='text-info'>$delivery_cost</span>/-</h5>";
        echo "<h4 class='px-3'>Subtotal: <strong class='text-info'>Rs. $subTotal/-</strong></h4>";

        // Add margin to the first button for the gap
        echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mr-3 border-0 text-light' name='continue_shopping'>";

        echo "<a href='../users_area/checkout.php' class='bg-secondary px-3 py-2 border-0 text-light text-decoration-none'>Proceed To Checkout</a>";
    } else {
        echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 text-light' name='continue_shopping'>";
    }

    if (isset($_POST['continue_shopping'])) {
        echo "<script>window.open('index.php', '_self')</script>";
    }
    ?>

        </div>

            </form>
        </div>
    </div>
    <?php
  include('../includes/footer.php');
  
  ?>


</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <!-- ... (remaining code) ... -->
</body>
</html>
