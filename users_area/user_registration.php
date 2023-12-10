<?php 
include('../includes/connect.php'); 
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Registration</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">

     <!-- font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <style>
        .userRegis{
            margin-left: 50px;
        }
        .mylogin{
            margin-top: 30px;
            margin-left: 150px;
        }
    </style>
   
</head>
<body>  
    <button type="button" class="btn btn-info m-2 px-4 border-0"><a href="../home/index.php" class="text-light">Back</a></button>
    <div class="container-fluid my-3">
        
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/userRegis.png" alt="regisImage" class="userRegis d-block">
                <p class="medium text-dark mylogin">Already have an account? <a href="user_login.php" class="text-danger">Login</a></p>

            </div>
            <div class="col-lg-6 col-xl-5">
            <h2 class="text-center text-dark">Sign Up</h2>
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <!-- username-field -->
                    <div class="form-outline mb-3">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" 
                        placeholder="Enter your username" autocomplete="off" required
                        name="user_username" minlength="4" maxlength="15">
                    </div> 

                    <!-- email-field -->
                    <div class="form-outline mb-3">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" 
                        placeholder="Enter your email" autocomplete="off" 
                        name="user_email">
                    </div> 

                     <!-- image-field -->
                     <div class="form-outline mb-3">
                        <label for="user_image" class="form-label">User Image (jpg or png only)</label>
                        <input type="file" id="user_image" class="form-control"  name="user_image" accept=".jpg, .jpeg, .png"/>
                    </div> 

                     <!-- password-field -->
                     <div class="form-outline mb-3">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" 
                        placeholder="Enter your password" autocomplete="off" 
                        name="user_password">
                    </div> 

                     <!-- confirm password-field -->
                     <div class="form-outline mb-3">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" 
                        placeholder="Confrim Password" autocomplete="off"  
                        name="conf_user_password">
                    </div> 

                     <!-- address-field -->
                     <div class="form-outline mb-3">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" 
                        placeholder="Enter your address" autocomplete="off"  
                        name="user_address">
                    </div> 

                     <!-- contact-field -->
                     <div class="form-outline mb-3">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" 
                        placeholder="Enter your mobile number" autocomplete="off"  
                        name="user_contact">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Create Account" class="btn btn-success py-2 px-3 border-0" name="user_register">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

   

<script>
    function validateForm() {
        var username = document.getElementById('user_username').value;
        var email = document.getElementById('user_email').value;
        var image = document.getElementById('user_image');
        var password = document.getElementById('user_password').value;
        var confirmPassword = document.getElementById('conf_user_password').value;
        var address = document.getElementById('user_address').value;
        var contact = document.getElementById('user_contact').value;

        // Validate username
        if (!/^[a-zA-Z]+$/.test(username)) {
            alert('Username should contain only alphabetical letters');
            return false;
        }

        // Validate email
        if (!isValidEmail(email)) {
            alert('Please enter a valid email address');
            return false;
        }

        // Validate image file type
        if (!isValidImageFile(image)) {
            alert('Please select a valid image file (JPG or PNG).');
            return false;
        }

        // Validate password
        if (!/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+]).{6,}$/.test(password)) {
        alert('Password should contain at least one uppercase letter, one number, one special character, and be at least 8 characters long');
        return false;
    }

        // Validate confirm password
        if (password !== confirmPassword) {
            alert('Password and Confirm Password do not match');
            return false;
        }

        if (address.trim() === '') {
            alert('Please enter your address');
            return false;
        }

        if (!/^(98)\d{8}$/.test(contact)) {
            alert('Contact should start with "98" and have a total of 10 digits');
            return false;
        }

        // Validate other fields as needed
        // ...

        return true; // Form will be submitted if all validations pass
    }

    function isValidEmail(email) {
        // Regular expression for a valid email format
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailRegex.test(email);
    }

    function isValidImageFile(input) {
        // Check if a file is selected
        if (input.files.length === 0) {
            return false;
        }

        // Get the file name and convert it to lowercase for case-insensitive comparison
        var fileName = input.files[0].name.toLowerCase();

        // Check if the file has a valid extension (JPG or PNG)
        if (fileName.endsWith('.jpg') || fileName.endsWith('.png')) {
            return true;
        }

        return false;
    }
</script>
</body>
</html>

<!-- php code -->
<?php
    if(isset($_POST['user_register'])){
        $user_username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
        $user_passowrd_confirm = $_POST['conf_user_password'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        $user_ip = getIPAddress();

        // select query
        $select_query = "SELECT * FROM user_table WHERE user_name = '$user_username' OR user_email = '$user_email'";
        $result = mysqli_query($conn, $select_query);
        $rows_count = mysqli_num_rows($result);
        if($rows_count > 0){
            echo "<script>alert('Username or email already exists')</script>";
            // echo "<script>window.location.href = 'user_registration.php';</script>";
            
        }elseif($user_password != $user_passowrd_confirm){
            echo "<script>alert('Passwords donot matched')</script>";
        }else{
            // insert-query
            move_uploaded_file($user_image_tmp, "./user_images/$user_image");
            $insert_query = "INSERT INTO user_table(user_name, user_email, user_password, 
            user_image, user_ip, user_address, user_mobile)VALUES('$user_username', '$user_email', 
            '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
            $sql_execute = mysqli_query($conn, $insert_query);
            if($sql_execute){
                echo "<script>alert('Account Created Successfully')</script>";
                echo "<script>window.open('../users_area/user_login.php', '_self')</script>";
            }
        }

        // selecting cart items
        $select_cart_items = "SELECT * FROM cart_details WHERE ip_address = '$user_ip'";
        $result_cart = mysqli_query($conn, $select_cart_items);
        $rows_count = mysqli_num_rows($result_cart);
        if($rows_count > 0){
            $_SESSION['username'] = $user_username;
            
            echo "<script>alert('You have some items in your cart')</script>";
            echo "<script>window.open('checkout.php', '_self')</script>";
        }else{
            echo "<script>window.open('../home/index.php', '_self')</script>";
        }

    }

?>