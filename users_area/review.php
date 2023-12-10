    <?php
        if(isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];
        } 
    ?>

<div class="container">
        <h1 class="text-dark mt-5">Rate this product</h1>
        <p>Tell others what you think</p>
        <div class="reviews" id="reviewsContainer">
            <!-- Display reviews here -->
        </div>
        <form action="#" method="POST">
        <div class="form-group">
            <!-- <label for="rating">Rating:</label> -->
            <div class="rating-stars">
                <span class="star" data-rating="1">&#9733;</span>
                <span class="star" data-rating="2">&#9733;</span>
                <span class="star" data-rating="3">&#9733;</span>
                <span class="star" data-rating="4">&#9733;</span>
                <span class="star" data-rating="5">&#9733;</span>
            </div>
            <input type="hidden" name="rating" id="selected-rating" value="0">
        </div>

        <p class="text-primary">Write a Review</p>


            <div class="form-group">
                <!-- <label for="comment">Comment:</label> -->
                <textarea class="form-control" name="comment" rows="3" placeholder="Describe your experience..." required="required"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>

    <div class="container">
       <h2 class="text-dark mt-5 mb-4 underline">Rating and reviews</h2>

    <?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(!isset($_SESSION['username'])){
        echo "<script>alert('You need to be logged in to rate and give reviews.')</script>";
    }else{
        $username = $_SESSION['username'];
        $rating = $_POST["rating"];
        $comment = $_POST["comment"];

        // Insert review into the database
        $sql = "INSERT INTO product_rating (product_id, rating, review, username, date_created) VALUES ($product_id, $rating, '$comment', '$username', NOW())";

        if (mysqli_query($conn, $sql)) {    
            // echo "Review submitted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

$sql_query = "SELECT * FROM product_rating WHERE product_id = $product_id ORDER BY date_created DESC";
$result = mysqli_query($conn, $sql_query);
if(mysqli_num_rows($result)==0){
    echo "<h3 class='text-danger'>No rating and reviews yet</h3>";
}
    
while ($row = mysqli_fetch_assoc($result)) {
   
        echo "<div class='review w-50'>";
        echo "<p class='font-weight-bold mb-0'> " . $row["username"] . "</p>";
        echo "<p class='mb-0'> " . generateStars($row["rating"], 'gold', 'gray') ." ". $row["date_created"] . "</p>";
        echo "<p class='mb-3'>" . $row["review"] . "</p>";
        echo "</div>";   
}



function generateStars($rating, $filledColor, $emptyColor) {
    $fullStars = floor($rating);
    $halfStar = ($rating - $fullStars >= 0.5) ? true : false;
    
    $stars = "";
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $fullStars) {
            $stars .= "<span style='color: $filledColor;'>&#9733;</span>";
        } else if ($i == $fullStars + 1 && $halfStar) {
            $stars .= "<span style='color: $filledColor;'>&#9733;</span>";
        } else {
            $stars .= "<span style='color: $emptyColor;'>&#9734;</span>";
        }
    }
    
    return $stars;
}


mysqli_close($conn);
?>

</div>





  

