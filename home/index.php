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
    <!-- <link rel="stylesheet" href="../reviews.css"> -->

    <style>
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
      background: white;
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
     @media (max-width: 768px) {
  /* Add your CSS rules for small screens here */
 
     }
     /* .signout{
      margin-top: 13px;
      color: whitesmoke;
     }
     .signout:hover{
      color: black;
     } */
    </style>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <!-- navbar -->
    <div class="p-0">
      <!-- first-child -->
      
      <nav class="navbar navbar-expand-lg bg-info navbar-light">
      <div class="container-fluid mydiv">
       <a href="index.php"><img src="../images/newproject.png" alt="clothing store logo" class="myclothinglogo"></a>

        <!-- for small screen button appear for option -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- !for small screen button appear for option -->
        <div class="collapse navbar-collapse container" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mx-5 mylink">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
            <!-- <li class="nav-item">
              <a class="nav-link" href="#review">Review</a>
            </li> -->
            
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
            <a href='../users_area/logout.php' class='nav link signout'>
            <i class='fa-solid fa-right-from-bracket'></i></a>
          </li>";
          }
          // echo session_id();
        ?>
      </ul>
    </nav>
    <div class="container">

      <div class="bg-light my-4">
        <!-- <h3 class="text-center">Our Slogan</h3> -->
        <!-- <p class="text-center text-dark font-weight-bold animated-paragraph">"Fashion made easy. Shop online, dress with confidence."</p> -->
        
        <p class="text-center font-weight-bold animated-paragraph" style="font-size: 24px; animation: bloom 3s infinite;">
  "Fashion made easy. Shop online, dress with confidence."
</p>
      </div>
      
      <!-- carousel -->
    <div class="row">
        <div class="col-md-12">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item" data-bs-interval="10000">
          <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#f5f5f5"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">First slide</text></svg> -->
          <img class="carousel" src="../images/carousel1.jpg" alt="">
         
          <!-- <div class="carousel-caption d-none d-md-block">
            <h5>Trade-In-Offer</h5>
            <p>Super value deals</p>
            <p>On all products</p>
          </div> -->
        </div>
        <div class="carousel-item active" data-bs-interval="2000">
        <img class="carousel" src="../images/red.jpg" alt="">          
        <!-- <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div> -->
        </div>
        <div class="carousel-item">
        <img class="carousel" src="../images/bag.jpg" alt="">
         <!-- <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div> -->
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>   
</div>
      </div> 
<!-- end of carousel -->

      <h2 class="text-center text-dark mt-5 mb-0 text-decoration-underline"><span class="text-primary">P</span>r<span class="text-warning">o</span>d<span class="text-secondary">u</span>c<span class="text-danger">t</span>s</h2>
    

      
  
      <!-- fourth-child -->
      <div class="row mt-4">  
       
        <div class="col-lg-12  col-lg-12 col-sm-12">
          <!-- products -->
          <div class="row">
            <!-- fetching-products -->
            <?php
            if(!isset($_GET['search_data_product'])){
              getproducts();
            }else{
              search_product();
            }
            ?>           
            <!-- row end -->
          </div>

          <!-- column-end -->
        </div>
      </div>
    </div>
  </div>

    <!-- last child -->
    <!-- footer -->
    <?php
      include('../users_area/contact_us.php');
      include('../includes/footer.php');
      
    ?>
  
   
    
 


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>