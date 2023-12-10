<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
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
      .navbar-nav .nav-item .nav-link:hover {
        color: whitesmoke;
        text-decoration: underline;
      }
     .carousel{
      height: 500px;
      width: 100%;
      background-image: cover;
     }
     body{
      overflow-x:hidden;
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
     .custom-margin{
        margin-left: 5px;
     }
     
      
    </style>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
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
    <div class="container">

      <div class="bg-light my-4">
        <!-- <h3 class="text-center">Our Slogan</h3> -->
        <p class="text-center text-dark font-weight-bold">"Fashion made easy. Shop online, dress with confidence."</p>
      </div>  
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                

               

<div class="container bg-light">
    <h1 class="text-center mb-5 font-weight-bold mt-5">Ship to a different address?</h1>
    <?php
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
    }
  ?>
    <div class="row">
      <div class="col-md-6 m-auto">
        <form action="#" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="firstName">First Name<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>
            <div class="form-group col-md-6">
              <label for="lastName">Last Name<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="lastName" name="lastName" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Company name(Optional)</label>
            <input type="email" class="form-control" id="email" name="company_name">
          </div>
          <div class="form-group">
            <label for="email">Province/State<span class="text-danger">*</span></label>
            <!-- <input type="email" class="form-control" id="email" name="email" required> -->
            <select name="region" id="" class="d-block form-select">
                <option value="province1">Province 1</option>
                <option value="province2">Province 2</option>
                <option value="province3">Province 3</option>
                <option value="province4">Province 4</option>
                <option value="province5">Province 5</option>
                <option value="province6">Province 6</option>
                <option value="province7">Province 7</option>
            </select>
          </div>

          <div class="form-group">
            <label for="city">Town/City<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="city" name="city">
          </div>

          <div class="form-group">
            <label for="street">Street address<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="street" name="street_address">
          </div>

          <div class="form-group">
            <label for="postalcode">Postalcode/Zip(optionl)</label>
            <input type="text" class="form-control" id="postalcode" name="postalcode">
          </div>

          <div class="form-group">
            <label for="phone">Phone<span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="phone" name="phone" pattern="98[0-9]{8}" title="Please enter a valid 10-digit phone number" required>
            <small class="form-text text-muted">Please enter a 10-digit phone number without any special characters.</small>
          </div>
          
         

          <div class="form-group">
            <label for="message">Order notes(optional)</label>
            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Notes about your order, eg. special notes for delivery"></textarea>
        </div>
          
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          <a href="confirm_payment.php?order_id=<?php echo $order_id; ?>" class="btn btn-primary float-right custom-margin" id="next">Next</a>
          <a href="billing.php" class="btn btn-secondary float-right">Previous</a>
        </form>
      </div>
    </div>
  </div>
            </div>
        </div>
    </div>

    <?php

      if(isset($_POST['submit'])){
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $company_name = $_POST['company_name'];
        $state = $_POST['region'];
        $city = $_POST['city'];
        $street_address = $_POST['street_address'];
        $postal_code = $_POST['postalcode'];
        $order_note = $_POST['message'];
        $phone = $_POST['phone'];
        
        

        $select_query = "SELECT * FROM user_orders WHERE order_id = $order_id";
        $run_select_query = mysqli_query($conn, $select_query);
        $row_count = mysqli_num_rows($run_select_query);
        if($row_count > 0){
          $row_data = mysqli_fetch_assoc($run_select_query);
            $user_id = $row_data['user_id'];
            $invoice_number = $row_data['invoice_number'];
        }
      

        $shipping_query = "INSERT INTO shipping_address (firstname, lastname, company_name, state,	city,	
        street_address,	postal_code, order_notes, phone, invoice_number) VALUES ('$firstname', '$lastname', '$company_name',
        '$state', '$city', '$street_address', $postal_code, '$order_note', '$phone', $invoice_number)";
        $run = mysqli_query($conn, $shipping_query);  
        if($run){
          echo "<script>alert('Shipping address Accepted Successfully!')</script>";
          // echo "<script>document.getElementById('next').style.display = 'block';
          // </script>";
        }else {
          echo "<script>alert('Failed to insert shipping address!')</script>";
        }


}

?>

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
