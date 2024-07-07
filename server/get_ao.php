<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category = 'Ao' LIMIT 4");

$stmt->execute();

$ao_products = $stmt->get_result();

?>