<?php
    include('../includes/connect.php');
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget-Password</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <!-- font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <style>
        .image{
            height: 100%;
            width: 100%;
            margin-left: 20px;
        }
        .heading{
            font-size: 60px;
            font-family: sans serif;
            letter-spacing: 3px;
            margin: 0;  
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="../images/forget_pass.png" alt="forgetPass" class="image">
                
            </div>
            <div class="col-md-6 mt-5">
                <h3 class="text-dark mt-5 heading">Forgot</h3>
                <h3 class="text-dark heading">Password</h3>
                <p class="mt-3">Please enter your email address below</p>
                <form action="" method="POST" class="form-outline">
                    <label for="reset" class="form-label">Email</label>
                    <input type="text" id="reset" name="reset_pass" class="form-control mb-4" placeholder="example123@gmail.com">
                    <input type="submit" value="Reset Password" name="submit" class="btn btn-primary text-center">
                </form>
            </div>
        </div>
    </div> 
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $email = $_POST['reset_pass'];
        $rand = rand(000000, 999999);
        
        
        // query to check that email is availabe or not in database
        $check = "SELECT * FROM admin_table WHERE admin_email = '$email'";
        $run_query = mysqli_query($conn, $check);
        $row_count = mysqli_num_rows($run_query);
        if($row_count > 0){
            $row_data = mysqli_fetch_array($run_query);
            $user_email = $row_data['admin_email'];
            $username = $row_data['admin_name'];
            if($email == $user_email){
                $to = $email;
                $subject = "Verification Code";
                $body = "Hi $username \n This is your verification code : $rand";
                $header = "From:chandraman8989@gmail.com";
                if(mail($to, $subject, $body, $header)){
                    $_SESSION['otp'] =  $rand;
                    echo "<script>alert('OTP sent to your email')</script>";      
                    echo "<script>window.open('admin_otp.php', '_self')</script>";      
                    // header('location:forget_password.php');
                }else{
                    echo "<script>alert('OTP sending failed')</script>";
                }
            }
        }else{
            echo "<script>alert('No such email found')</script>";
        }
    }
?>