<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category = 'jeans' LIMIT 4");

$stmt->execute();

$jean_products = $stmt->get_result();

?>