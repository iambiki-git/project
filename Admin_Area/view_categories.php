
<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-4 text-center">
    <thead class="bg-info">
        <tr>
            <th>SN</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light text-center">
        <?php
            if(isset($_GET['cate_page'])){
                $page = $_GET['cate_page'];
                
            }else{
                $page = 1; 
            }
                
                $select_query = "SELECT * FROM categories";
                $run = mysqli_query($conn, $select_query);
                $row_count = mysqli_num_rows($run);

                $no_pages = 6;
                $tot_pages = ceil($row_count/$no_pages);

                // ensuring $page is within valid range
                if ($page < 1){
                    $page = 1;
                }else if ($page > $tot_pages){
                    $page = $tot_pages;
                }
                // creating pagination button
                echo "<nav aria-label='Page navigation example'><ul class='pagination'>";
                if ($page > 1) {
                    $previous_page = $page - 1;
                    echo "<li class='page-item'><a class='page-link' href='adminPanel.php?view_categories&cate_page=".$previous_page."'>Previous</a></li>";
                }
                for ($btn = 1; $btn <= $tot_pages; $btn++) {
                    echo '<li class="page-item';
                    if ($btn == $page) {
                        echo ' active';
                    }
                    echo '"><a class="page-link" href="adminPanel.php?view_categories&cate_page=' . $btn . '">' . $btn . '</a></li>';
                }
                if ($page < $tot_pages) {
                    $next_page = $page + 1;
                    echo "<li class='page-item'><a class='page-link' href='adminPanel.php?view_categories&cate_page=".$next_page."'>Next</a></li>";
                }
                echo "</ul>
                    </nav>";

                $startinglimit = ($page-1)*$no_pages;
                $sql = "SELECT * FROM categories LIMIT ".$startinglimit. ','.$no_pages;
                $result = mysqli_query($conn, $sql);
                $number = $startinglimit;
                while($row=mysqli_fetch_assoc($result)){
                    $category_id = $row['category_id'];
                    $category_title = $row['category_title'];
                    $number++;
        ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $category_title; ?></td>
            <td><a href='adminPanel.php?edit_category=<?php echo $category_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='adminPanel.php?delete_category=<?php echo $category_id; ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php

            } ?>
    </tbody>
</table>

<?php


?>
