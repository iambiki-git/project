<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online_store";

    

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        die(connect_error($conn));
    }
    // echo "Connection Successful";
    // echo "<hr>";
?>