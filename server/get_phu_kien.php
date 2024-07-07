<?php

include('connection.php');


$stmt = $conn->prepare("SELECT * FROM products WHERE product_category = 'Phu_kien' LIMIT 4");

$stmt->execute();

$phu_kien_products = $stmt->get_result();

?>
