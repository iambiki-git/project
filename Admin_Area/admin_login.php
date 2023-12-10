<?php 
    include('../functions/common_function.php');
    @session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>
     <!-- bootstrap css link -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    
    <style>
        body{
            overflow-x:hidden;
        }
        .form-outline i{
            position: absolute;
            right: 22px;
            color: #ccc;
            top: 41%;
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
    <div class="container mt-4">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/login.png" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="POST">
                    <div class="form-outline mb-4 mt-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="enter your username" required="required" class="form-control" autocomplete="off">
                    </div>

                    

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="enter your password" required="required" class="form-control" autocomplete="off">
                        <i class="fas fa-eye"></i>
                    </div>
                    
                    <div>
                        <p class="font-weight-bold"><a href="forget_pass.php" class="text-danger">Forget Password?</a></p>
                    </div>

                    
                    <div>
                        <input type="submit" class="btn btn-info px-3 py-2 border-0" name="admin_login" value="Login">
                        <p class="small font-weight-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php" class="text-info">Register</a></p>
                        <p>admin username: admin <br>
                        admin password: Root1@</p>
                    </div>
                </form>
        </div>
        </div>
    </div>
    <script>
        const password = document.querySelector("#password"),
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


    if(isset($_POST['admin_login'])){
        $admin_username = $_POST['username'];
        $admin_password = $_POST['password'];
    
        // select query 
        $select_query = "SELECT * FROM admin_table WHERE admin_name = '$admin_username'";
        $run_query = mysqli_query($conn, $select_query);
        $rows_count = mysqli_num_rows($run_query);
        if($rows_count > 0){
        // Fetch the admin data
        $row_data = mysqli_fetch_assoc($run_query);
    
        // Verify the username
        if($admin_username === $row_data['admin_name']){
            // Verify the password
            if(password_verify($admin_password, $row_data['admin_password'])){
                $_SESSION['admin_username'] =  $admin_username;
                $_SESSION['logged_in'] = true;
                echo "<script>alert('Logged In Successfully')</script>";
                echo "<script>window.open('adminPanel.php', '_self')</script>";
            } else {
                echo "<script>alert('Password do not matched')</script>";
                echo "<script>window.open('admin_login.php', '_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
            echo "<script>window.open('admin_login.php', '_self')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
        echo "<script>window.open('admin_login.php', '_self')</script>";
    }
}
    
?>