<sction id="contact">

<div class="container bg-light">
    <h1 class="text-center mb-5 font-weight-bold mt-5">C<span class="text-danger">o</span>nt<span class="text-primary">a</span>ct <span class="text-warning">U</span>s</h1>
    <div class="row">
      <div class="col-md-6 m-auto">
        <form action="#" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="firstName">First Name<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>
            <div class="form-group col-md-6">
              <label for="lastName">Last Name<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="lastName" name="lastName" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email<span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>

          <div class="form-group">
            <label for="phone">Phone<span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="phone" name="phone" pattern="98[0-9]{8}" title="Please enter a valid 10-digit phone number" required>
            <small class="form-text text-muted">Please enter a 10-digit phone number without any special characters.</small>
          </div>

          <div class="form-group">
            <label for="address">Address<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="address" name="address" required>
          </div>
          <div class="form-group">
            <label for="message">Message<span class="text-danger">*</span></label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button><br><br>
        </form>
      </div>
    </div>
  </div>

</sction>

<?php

  $ip_address = getIPAddress();

        if(isset($_POST['submit'])){
            if(isset($_SESSION['username'])){
               $username = $_SESSION['username'];
                

                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $message = $_POST['message'];

                //select query 
                $select = "SELECT * FROM user_table";
                $run = mysqli_query($conn, $select);
                

                while($row_data = mysqli_fetch_assoc($run)){
                  $user_id = $row_data['user_id'];
                }
                
                

                // insert query 
                $insert_query = "INSERT INTO contact_us_table (firstname, lastname, email, phone, message,
                userId, ip_address) VALUES ('$firstName', '$lastName', '$email', '$phone', '$message',  '$user_id', '$ip_address')";
                $run_query = mysqli_query($conn, $insert_query);
                if($run_query){
                    echo "<script>alert('Submitted')</script>";
                    // echo "<script>window.open('')</script>";
                }


                
            }else{
                echo "<script>alert('Login first')</script>";
                echo "<script>window.open('../users_area/user_login.php', '_self')</script>";

            }
            
    
    
    
    
    
        }
    

    

?>

