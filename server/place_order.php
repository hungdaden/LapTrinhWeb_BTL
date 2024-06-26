<?php
session_start();

include('connection.php');

if (isset($_POST['place_order'])    ) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost= $_SESSION['total'];
    $order_status= "on_hold";
    $user_id = 1;
    $order_date = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date)
                VALUES (?,?,?,?,?,?,?);   ");
    $stmt->bind_param('isiisss',$order_cost,$order_status,$user_id,$phone,$city,$address,$order_date);
    
    $stmt->execute();

    $order_id = $stmt->inseri_id;

    echo $order_id;

}


?>