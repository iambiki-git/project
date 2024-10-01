<?php
// sort.php
function bubbleSortByPrice(&$products, $order = 'asc') {
    $n = count($products);
    for ($i = 0; $i < $n-1; $i++) {
        for ($j = 0; $j < $n-$i-1; $j++) {
            // Sorting by product price based on ascending or descending order
            if ($order == 'asc') {
                if ($products[$j]['product_price'] > $products[$j+1]['product_price']) {
                    // Swap if the current product price is greater than the next one
                    $temp = $products[$j];
                    $products[$j] = $products[$j+1];
                    $products[$j+1] = $temp;
                }
            } else {
                if ($products[$j]['product_price'] < $products[$j+1]['product_price']) {
                    // Swap if the current product price is smaller (for descending order)
                    $temp = $products[$j];
                    $products[$j] = $products[$j+1];
                    $products[$j+1] = $temp;
                }
            }
        }
    }
}
