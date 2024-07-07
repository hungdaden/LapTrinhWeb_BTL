<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category = 'Quan' LIMIT 4");

$stmt->execute();

$quan_products = $stmt->get_result();

?>