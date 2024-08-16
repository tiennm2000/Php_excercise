<?php
$prices = ['Milk' => 1.99, 'Eggs' => 2.50, 'Bread' => 1.50];
foreach ($prices as $key => $price) {
    echo $key . ": ";
    echo "Before apply discount " . $price . " and ";
    echo "After applied discount " . $price * 0.1;
    echo "<br/>";
}