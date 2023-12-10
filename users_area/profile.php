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
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- font awesome link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>



    <link rel="stylesheet" href="../style.css">

    <style>
      body{
        overflow-x:hidden;
      }
       /* .navbar-nav .nav-item .myfe{
          font-family: cursive; 
          
        } */
    
        .navbar-nav .nav-item .nav-link:hover {
            color: whitesmoke;
            text-decoration: underline;
        } 
        .profile_image{ 
            width: 100%;
            object-fit: contain;
            border-radius: 5%;
            height:200px;
            
        }
        .mynav{
            font-size:25px;
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
    <!-- navbar -->
    <div class=" p-0">
      <!-- first-child -->
      
      <nav class="navbar navbar-expand-lg bg-info navbar-light">
      <div class="container-fluid mydiv">
      <a href="../home/index.php"><img src="../images/newproject.png" alt="clothing store logo" class="myclothinglogo"></a>
        <!-- for small screen button appear for option -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- !for small screen button appear for option -->
        <div class="collapse navbar-collapse container" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mylink">
            <li class="nav-item">
              <a class="nav-link  active" aria-current="page" href="../home/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Category_men_women/men_page.php">Men</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Category_men_women/female_page.php">Women</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">My Account</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../home/cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup class="text-danger font-weight-bold"><?php cart_item();  ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?></a>
            </li>
            
          </ul>
          <form class="d-flex" role="search" action="../home/index.php" method="get">
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
            
            <a href='../users_area/logout.php' class='nav link signout'>
            <i class='fa-solid fa-right-from-bracket'></i></a>          </li>";
          }
        ?>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="bg-light my-4">
        <!-- <h3 class="text-center">Clothing Store</h3> -->
        <p class="text-center text-dark font-weight-bold">"Fashion made easy. Shop online, dress with confidence."</p>
      </div>   

    
      <div class="row">
        <div class="col-md-2 p-0 mx-1">
          <ul class="navbar-nav bg-secondary text-center" style="height:100vh;">
            <li class="nav-item bg-info">
              <a class="nav-link" href="#"><h4 class="mynav text-light">Your Profile</h4></a>
            </li>
           <?php
            $username = $_SESSION['username'];
            $user_image = "SELECT * FROM user_table WHERE user_name = '$username'";
            $run_query = mysqli_query($conn, $user_image);
            $row_image = mysqli_fetch_array($run_query);
            $user_image = $row_image['user_image'];
            echo "<li class='nav-item'>
            <img src='./user_images/$user_image' alt='' class='profile_image mt-1'>
          </li>";
           ?>
            
            
            <li class="nav-item mt-5">
              <a class="nav-link" href="profile.php"><h6>Pending Orders</h6></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php?edit_account"><h6>Edit Account</h6></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php?my_orders"><h6>My Orders</h6></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="profile.php?delete_account"><h6>Delete Account</h6></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php"><h6>Logout</h6></a>
            </li>
          </ul>
        </div>
        
        <div class="col-md-9 text-center">
          <?php 
          get_user_order_details(); 
            
          if(isset($_GET['edit_account'])){
              include('edit_account.php');
            }
          
            if(isset($_GET['my_orders'])){
                include('user_orders.php');
            }

            if(isset($_GET['delete_account'])){
              include('delete_account.php');
          }
            if(isset($_GET['show_product_detail'])){
              include('show_product_detail.php');
          }
            
          ?>
        </div>
      </div>


        <div class="row mt-5">  
    <!-- last child -->
    <!-- footer -->
    <?php
      include('../includes/footer.php');
    ?>
        <div>
    </div>
   
    
  


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>