<?php
    if(isset($_GET['edit_account'])){
        $user_seesion_name = $_SESSION['username'];
        $select_query = "SELECT * FROM user_table WHERE user_name = '$user_seesion_name'";
        $result_query = mysqli_query($conn, $select_query);
        $row_fetch = mysqli_fetch_assoc($result_query);
        $user_id = $row_fetch['user_id'];
        $user_name = $row_fetch['user_name'];
        $user_email = $row_fetch['user_email'];
        $user_pass = $row_fetch['user_password'];
        $user_address = $row_fetch['user_address'];
        $user_mobile = $row_fetch['user_mobile'];
    }

        if(isset($_POST['user_update'])){
            $update_id = $user_id;
            $user_name = $_POST['user_username'];
            $user_email = $_POST['user_email'];
            $user_pass = $_POST['user_password'];
            $user_address = $_POST['user_address'];
            $user_mobile = $_POST['user_mobile'];
            $user_image = $_FILES['user_image']['name'];
            $user_image_tmp = $_FILES['user_image']['tmp_name'];
            move_uploaded_file($user_image_tmp, "./user_images/$user_image");

            //update query
            $update_data = "UPDATE user_table SET user_name = '$user_name', user_email = '$user_email', 
            user_password = '$user_pass', user_image = '$user_image', user_address = '$user_address', user_mobile = '$user_mobile'
            WHERE user_id = $update_id";
            $result_query_update = mysqli_query($conn, $update_data);
            if($result_query_update){
                echo "<script>alert('Data Updated Successfully')</script>";
                echo "<script>window.open('logout.php', '_self')</script>";
            }
            
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-Account</title>
    <style>
        .edit_img{
            width: 100px;
            height: 100px:
            object-fit:contain;
        }
    </style>
</head>
<body>
    <h3 class="text-success mb-4">Edit Account</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_name ?>" name="user_username">
        </div>

        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value= "<?php echo $user_email ?>" name="user_email">
        </div>

        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="./user_images/<?php echo $user_image ?>" alt="" class="edit_img">
        </div>

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
        </div>

        <div class="form-outline mb-4">
            <input type="password" class="form-control w-50 m-auto" value="<?php echo $user_pass ?>" name="user_password">
        </div>

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile">
        </div>

        <input type="submit" class="btn btn-success py-2 px-3 border-0" value="Update" name="user_update">
        
    </form>
</body>
</html>