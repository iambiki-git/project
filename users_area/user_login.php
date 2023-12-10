<?php 
    include('../functions/common_function.php');
    @session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Login</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"     
    crossorigin="anonymous">

      <!-- font awesome link --> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <style>
        .signup_img{
            margin-left: 100px;
        }
        .createlink{
            margin-left: 170px;
            text-decoration: underline;
        }
        .form-outline i{
            position: absolute;
            right: 22px;
            color: #ccc;
            top: 63%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .form-outline i.active::before{
            color: #333;
            content: "\f070";
        }
       
    </style>

   
</head>
<body>
    <div class="container my-3">
        
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-6 col-xl-5 mt-5">
                <img src="../images/signup.png" alt="singup image" class="image-fluid signup_img d-block">
                <a href="user_registration.php" class="text-dark font-weight-bold small createlink">Create an account</a>
            </div>
            <div class="col-lg-6 col-xl-5">
            <h2 class="text-center mt-5">Sign In</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- username-field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" 
                        placeholder="Enter your username" autocomplete="off" required="required" 
                        name="user_username">
                    </div> 

                     <!-- password-field -->
                     <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" 
                        placeholder="Enter your password" autocomplete="off" required="required" 
                        name="user_password">
                        <i class="fas fa-eye"></i>
                    </div> 
                    <div>
                        <p class="font-weight-bold"><a href="forget_password.php" class="text-danger">Forget Password?</a></p>
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="btn btn-success py-2 px-3 border-0" name="user_login">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script>
        const password = document.querySelector("#user_password"),
        toggleBtn = document.querySelector(".form-outline i");

        toggleBtn.onclick = () => {
            if (password.type == "password") {
                password.type = "text";
                toggleBtn.classList.add("active");
            } else {
                password.type = "password";
                toggleBtn.classList.remove("active");
    }
}
    </script>
</body>
</html>


<?php
    if(isset($_POST['user_login'])){
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        
        $select_query = "SELECT * FROM user_table WHERE user_name = '$user_username'";
        $result = mysqli_query($conn, $select_query);
        $row_count = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);
        $user_ip = getIPAddress();


        // cart item
        $select_query_cart = "SELECT * FROM cart_details WHERE ip_address = '$user_ip'";
        $select_cart = mysqli_query($conn, $select_query_cart);     
        $row_count_cart = mysqli_num_rows($select_cart);
        if($row_count > 0){
            $_SESSION['username'] = $user_username;
            if(password_verify($user_password,$row_data['user_password'])){
                // echo "<script>alert('Logged In Successfully')</script>";
                if($row_count == 1 AND $row_count_cart == 0){
                    $_SESSION['username'] = $user_username;
                    echo "<script>alert('Logged In Successfully')</script>";
                    echo "<script>window.open('profile.php', '_self')</script>";
                }else{
                    $_SESSION['username'] = $user_username;
                    echo "<script>alert('Logged In Successfully')</script>";
                    echo "<script>window.open('payment.php', '_self')</script>";
                }  
            }else{
                echo "<script>alert('Invalid Credentials')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
?>