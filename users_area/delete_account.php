
    <h3 class="text-danger mt-3 mb-3">Do you really want to delete your account?</h3>
    <form action="" method="POST" class="mt-4 d-flex">
        <div class="form-outline mb-3 w-50">
            <input type="submit" class="form-control w-50 m-auto bg-info text-light" name="delete" value="Yes">
        </div>
        <div class="form-outline mb-3 w-50">
            <input type="submit" class="form-control w-50 m-auto bg-info text-light" name="dont_delete" value="No">
        </div>
    </form>

    <?php
        $username = $_SESSION['username'];
        if(isset($_POST['delete'])){
            $delete_query = "DELETE FROM user_table WHERE user_name = '$username'";
            $execute_delete_query = mysqli_query($conn, $delete_query);
            if($execute_delete_query){
                session_destroy();
                echo "<script>alert('Account Deleted Successfully')</script>";
                echo "<script>window.open('../home/index.php', '_self')</script>";
            }
        }

        if(isset($_POST['dont_delete'])){
            echo "<script>window.open('profile.php', '_self')</script>";
        }

    ?>