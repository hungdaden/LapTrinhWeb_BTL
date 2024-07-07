<?php 

session_start();

include('../server/connection.php'); ?>

<?php

    if(!isset($_SESSION['admin_logged_in'])){
        header('location: login.php');
        exit();
    }

    if(isset($_GET['order_id'])){
        $product_id = $_GET['order_id'];
        $stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ?");
        $stmt->bind_param('i', $_GET['order_id']);
        
        if($stmt->execute()){
            header('location: index.php?delete_order_success=Order has been deleted SUCCESSFULLY');
        }else{
            header('location: index.php?delete_order_failure=Order has been deleted FAILUREFULLY');
        }
    }

?>