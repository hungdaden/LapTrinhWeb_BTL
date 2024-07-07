<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category = 'Balo' LIMIT 4");

$stmt->execute();

$balo_products = $stmt->get_result();

?>
