<!-- connect file -->
<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();

    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('location:admin_login.php');
        exit();
    }


    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <!-- font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>


    <link rel="stylesheet" href="../style.css">
    <style>
        .admin-image{
            border-radius:20% ;
            height: 120px;
            width: 120px;
            object-fit:contain;
            background:transparent;
        }
        /* hides horizontal scroll bars */
        body{
            overflow-x:hidden;
        }
        .edit_image{
            width:80px;
            object-fit:contain;
        }
        .mybutton{
            width: 80%;
        }
        .mycolor{
            background: #020d36;
            height: 150px;
        }
        .myfont{
            font-size: 40px;
            display: block;
            font-family: cursive;
        }
        .mypara{
            font-size:20px;
            margin-top: 5px;
        }
        .signout{
            display: inline;
        }   
        




        .sidebar{
			width: 230px;
			height: 100%;
			background-color: #222;
			padding: 10px;
			box-sizing: border-box;
			color: #fff;
			overflow: hidden;
			/* transition: width .75s ease; */
           
		}
		/* .sidebar:hover {
			width: 230px;
		} */

        .linktext{
            font-size: 15px;
            
        }
        .messagecount{
            font-size: 15px;
        }
        
        
        
    </style>
</head>
<body>

    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first-child -->
        <nav class="navbar navbar-expand-lg navbar-light mycolor">
            <div class="container-fluid">
            <!-- <a href="#"><img src="../images/now.png" alt="" class="admin-image"></a> -->
                <h4 class="text-light myfont my-5">ADMIN
                <p class="text-light mypara">Welcome to your dashboard</p>
                </h4>

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                    <?php
                            if(!isset($_SESSION['admin_username'])){
                                echo " <li class='nav-item'>
                                <a href='' class='nav-link text-light'>Welcome guest</a>
                            </li>";
                            }else{
                                echo " <li class='nav-item'>
                                <p class='nav-link text-light signout'>Welcome ".$_SESSION['admin_username']."</p>
                                <a href='admin_logout.php' class='nav-link text-light signout'><i class='fa-solid fa-right-from-bracket'></i></a>
                            </li>";
                            }


                    ?>
                       
                    </ul>
                </nav>
            </div>
        </nav>
        
        <!-- second-child -->
        <!-- <div class="bg-light">
            <h3 class="text-center p-2">Admin Panel</h3>
        </div> -->

        
        <!-- third-child -->
        <div class="row">
            <div class="col-md-2 d-flex align-items-center">
               <div class="button text-center">

                <!-- <a href="adminPanel.php"><img src="../images/logo1.png" alt="" class="admin-image"></a> -->

                <div class="sidebar" id="mysidebar">
                <!-- <p class="text-light text-center">Admin</p> -->
                <i class="fa-solid fa-house"></i> 
                <button class="btn   mybutton"><a href="adminPanel.php" class="nav-link text-light linktext">Home</a></button>
                <br><i class="fa-solid fa-arrow-right"></i>
                <button class="btn   mybutton"><a href="insert_product.php" class="nav-link text-light linktext">Insert Products</a></button>
                <br><i class="fa-regular fa-eye"></i>
                <button class="btn   mybutton"><a href="adminPanel.php?view_products" class="nav-link text-light linktext">View Products</a></button>
                <br><i class="fa-solid fa-arrow-right"></i>
                <button class="btn   mybutton"><a href="adminPanel.php?insert_category" class="nav-link text-light linktext">Insert Category</a></button>
                <br><i class="fa-regular fa-eye"></i>
                <button class="btn   mybutton"><a href="adminPanel.php?view_categories" class="nav-link text-light linktext">View Categories</a></button>
                <br><i class="fa-solid fa-arrow-right"></i>
                <button class="btn   mybutton"><a href="adminPanel.php?insert_brands" class="nav-link text-light linktext">Insert Brands</a></button>
                <br><i class="fa-regular fa-eye"></i>
                <button class="btn   mybutton"><a href="adminPanel.php?view_brands" class="nav-link text-light linktext">View Brands</a></button>
                <br><i class="fa-solid fa-bag-shopping"></i>
                <button class="btn   mybutton"><a href="adminPanel.php?list_orders" class="nav-link text-light linktext">All Orders<sup class="text-danger font-weight-bold messagecount"><?php userOrder(); ?></sup></a></button>
                <br><i class="fa-regular fa-credit-card"></i>
                <button class="btn   mybutton"><a href="adminPanel.php?payment_list" class="nav-link text-light linktext">All Payments</a></button>
                <br><i class="fa-solid fa-list"></i>
                <button class="btn   mybutton"><a href="adminPanel.php?users_list" class="nav-link text-light linktext">Users List <sup class="text-danger font-weight-bold messagecount"><?php userList();  ?></sup></a></button>
                <br><i class="fa-solid fa-message"></i>
                <button class="btn   mybutton"><a href="adminPanel.php?user_message" class="nav-link text-light linktext">Users message<sup class="text-danger font-weight-bold messagecount"><?php userMessage(); ?></sup></a></button>
                <br><i class="fa-solid fa-location-dot"></i>
                <button class="btn   mybutton"><a href="adminPanel.php?billing_details" class="nav-link text-light linktext">Billing Details</a></button>
                <br><i class="fa-solid fa-address-book"></i>
                <button class="btn   mybutton"><a href="adminPanel.php?shipping_address" class="nav-link text-light linktext">Shipping Address</a></button>
                <!-- <button class="btn btn-info my-1 mybutton"><a href="admin_logout.php" class="nav-link text-light bg-info my-1">Logout</a></button> -->
                </div>
               </div>
            </div>


            <div class="col-md-10">
                <div class="container my-3"> 
                
                  
                
                    
                    
                    <?php
                        if(isset($_GET['insert_category'])){
                            include('insert-categories.php');
                        }   
                        
                        if(isset($_GET['insert_brands'])){
                            include('insert_brands.php');
                        }  

                        if(isset($_GET['view_products'])){
                            include('view_products.php');
                        } 

                        if(isset($_GET['edit_products'])){
                            include('edit_products.php');
                        }

                        if(isset($_GET['delete_product'])){
                            include('delete_product.php');
                        }

                        if(isset($_GET['view_categories'])){
                            include('view_categories.php');
                        }

                        if(isset($_GET['view_brands'])){
                            include('view_brands.php');
                        }

                        if(isset($_GET['edit_category'])){
                            include('edit_category.php');
                        }

                        if(isset($_GET['delete_category'])){
                            include('delete_category.php');
                        }

                        if(isset($_GET['edit_brand'])){
                            include('edit_brand.php');
                        }

                        if(isset($_GET['delete_brand'])){
                            include('delete_brand.php');
                        }

                        if(isset($_GET['list_orders'])){
                            include('list_orders.php');
                        }

                        if(isset($_GET['delete_order'])){
                            include('delete_order.php');
                        }

                        if(isset($_GET['payment_list'])){
                            include('payment_list.php');
                        }

                        if(isset($_GET['delete_payment'])){
                            include('delete_payment.php');
                        }

                        if(isset($_GET['users_list'])){
                            include('users_list.php');
                        }

                        if(isset($_GET['delete_user'])){
                            include('delete_user.php');
                        }

                        if(isset($_GET['user_message'])){
                            include('user_message.php');
                        }

                        if(isset($_GET['view_message'])){
                            include('view_message.php');
                        }

                        if(isset($_GET['billing_details'])){
                            include('billing_detail.php');
                        }
                        if(isset($_GET['shipping_address'])){
                            include('shipping_address.php');
                        }
                        if(isset($_GET['show_product_detail'])){
                            include('show_product_detail.php');
                        }
                        
                        
                       

                        

                        

                        



                         
                         if(!isset($_GET['insert_category'])){
                             if(!isset($_GET['insert_brands'])){
                                 if(!isset($_GET['view_products'])){
                                     if(!isset($_GET['edit_products'])){
                                         if(!isset($_GET['delete_product'])){
                                             if(!isset($_GET['view_categories'])){
                                                 if(!isset($_GET['view_brands'])){
                                                     if(!isset($_GET['edit_category'])){
                                                         if(!isset($_GET['delete_category'])){
                                                             if(!isset($_GET['edit_brand'])){
                                                                 if(!isset($_GET['delete_brand'])){
                                                                     if(!isset($_GET['list_orders'])){
                                                                         if(!isset($_GET['delete_order'])){
                                                                             if(!isset($_GET['payment_list'])){
                                                                                 if(!isset($_GET['delete_payment'])){
                                                                                     if(!isset($_GET['users_list'])){
                                                                                         if(!isset($_GET['delete_user'])){
                                                                                             if(!isset($_GET['view_products.php&page'])){
                                                                                                 if(!isset($_GET['user_message'])){
                                                                                                     if(!isset($_GET['view_message'])){
                                                                                                         if(!isset($_GET['billing_details'])){
                                                                                                             if(!isset($_GET['shipping_address'])){
                                                                                                      
                                                                                                          echo "
                                                                                                          <h2 class='text-right text-dark font-weight-bolder bg-light mb-4'>DASH-<span class='text-primary font-weight-bolder'>BOARD</span></h2>";
                                                                                                         
                                                                                                        dashboard();
                                                                                                        echo "<br>";
                                                                                                         }
                                                                                                     }
                                                                                                     }

                                                                                                 }

                                                                                             }
                                                                                            

                                                                                            

                                                                                         }

                                                                                     }

                                                                                 }

                                                                             }

                                                                         }

                                                                     }
                                                                 }
                                                                
                                                             }
                                                         }
                                                        
                                                     }
                                                 }   
                                             }
                                         }
                                     }
                                 }
                             }  
                         }

        
                    ?>
                </div>
            </div>
        </div>

       


        <!-- last child -->
    <?php
    
      include('../includes/footer.php');
    ?>
    </div>





    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>