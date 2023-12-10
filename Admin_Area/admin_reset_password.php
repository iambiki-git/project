<?php
    include('../includes/connect.php');
    session_start();
    $msg = '';

    if(isset($_POST['submit'])){
        $new_password = $_POST['password'];
        $new_hash_password = password_hash($new_password, PASSWORD_DEFAULT);
        $conf_password = $_POST['conf_password'];
        if($new_password == $conf_password){
            $update_query = "UPDATE admin_table SET admin_password = '$new_hash_password'";
            $run = mysqli_query($conn, $update_query);
            if($run){
                echo "<script>alert('Password reset successfully')</script>";
                echo "<script>window.open('admin_login.php', '_self')</script>";
            }
        }else{
            $msg =  "New password and confirm password donot matched";
        }
    }
    
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
            font-size: 40px;
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
                <h3 class="text-dark mt-5 heading">Enter new</h3>
                <h3 class="text-dark heading mb-4">Password</h3>
                <!-- <p class="mt-3">Please enter your email address below</p> -->
                <form action="" method="POST" class="form-outline">
                    <label for="reset" class="form-label">Password</label>
                    <input type="text" id="reset" name="password" class="form-control mb-3" placeholder="new password">
                    <label for="reset" class="form-label">Confrim Password</label>
                    <input type="text" id="reset" name="conf_password" class="form-control mb-4" placeholder="confirm password">
                    <p class="text-danger"><?php echo $msg; ?></p>
                    <input type="submit" value="Submit" name="submit" class="btn btn-primary text-center">
                </form>
            </div>
        </div>
    </div> 
</body>
</html>

