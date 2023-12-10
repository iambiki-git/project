<!-- connect file -->
<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Registration</title>
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
       
        
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin1.png" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="POST" onsubmit="return validateRegistrationForm()">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="enter your username" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="enter your email" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="enter your password"  class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Confirm Password</label>
                        <input type="password" id="c_password" name="confirm_password" placeholder="enter your confirm_password"  class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-info px-3 py-2 border-0" name="admin_registration" value="Register">
                        <p class="small font-weight-bold mt-2 pt-1">Already have an account? <a href="admin_login.php" class="text-info">Login</a></p>
                    </div>
                </form>
        </div>
        </div>
    </div>
   
    <script>
    function validateRegistrationForm() {
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('c_password').value;

        // Validate username
        if (!isValidUsername(username)) {
            alert('Username should be between 5 and 15 characters and contain uppercase, lowercase, and digits');
            return false; // Prevent form submission
        }

        // Validate email
        if (!isValidEmail(email)) {
            alert('Please enter a valid email address');
            return false; // Prevent form submission
        }

        // Validate password
        if (!isValidPassword(password)) {
            alert('Password should be between 5 and 15 characters and include at least one lowercase letter, one uppercase letter, one digit, and one special character.');
            return false; // Prevent form submission
        }

        // Validate confirm password
        if (password !== confirmPassword) {
            alert('Password and Confirm Password do not match');
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }

    function isValidUsername(username) {
    // Username should be between 5 and 15 characters and may contain uppercase, lowercase, and digits
    return /^[a-zA-Z\d]{5,15}$/.test(username);
}

    function isValidEmail(email) {
        // Regular expression for a valid email format
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailRegex.test(email);
    }

    function isValidPassword(password) {
    // Password should be between 5 and 15 characters,
    // contain at least one lowercase letter, one uppercase letter, one digit, and one special character
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[a-zA-Z\d!@#$%^&*()_+]{5,15}$/.test(password);
}
</script>


</body>
</html>

<?php
    if(isset($_POST['admin_registration'])){
        $admin_name = $_POST['username'];
        $admin_email = $_POST['email'];
        $admin_password = $_POST['password'];
        $admin_hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
        $admin_conf_password = $_POST['confirm_password'];

        // select query
        $select_query = "SELECT * FROM admin_table WHERE admin_name = '$admin_name'";
        $run_query = mysqli_query($conn, $select_query);
        $rows_count = mysqli_num_rows($run_query);
        if($rows_count > 0){
            echo "<script>alert('User Already Exists! Try with different username')</script>";
        }else if($admin_password != $admin_conf_password){
            echo "<script>alert('Password do not matched')</script>";
        }else{
            // insert query
            $insert_query = "INSERT INTO admin_table (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$admin_email', '$admin_hash_password')";
            $execute_query = mysqli_query($conn, $insert_query);
            if($execute_query){
                echo "<script>alert('Admin Registration Successful')</script>";
                echo "<script>window.open('admin_login.php', '_self')</script>";
            }
        }
    }
?>