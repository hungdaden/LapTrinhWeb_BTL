<?php
session_start();
include ('server/connection.php');

// bat cai nay len thi loi nen tat di :)))
// if(isset($_SESSION['logged_in'])){
//   header('location: login.php');
//   exit;
// }



if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit;
  }
}

if(isset($_POST['change_password'])){
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $user_email = $_SESSION['user_email'];
    // check confirmpassword co giong password hay khong
  if($password !== $confirm_password){
    header('location: account.php?error=Passwords dont match');
  }

  // check password co ngan hon 6 ki tu hay khong
  else if(strlen($password) < 6){
    header('location: account.php?error=Passwords must be at least 6 characters');
  }else{
    // neu khong co loi
    $stmt = $conn->prepare("UPDATE users SET user_password = ? WHERE user_email = ?");
    $stmt->bind_param('ss', md5($password), $user_email);
    
    if($stmt->execute()){
      header('location: account.php?message=Password has been updated successfully');
    }else{
      header('location: account.php?message=Password has been updated unsuccessfully');
    }

  }
}



// get orders
if (isset($_SESSION['logged_in'])) {

  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id =? ");

  $stmt->bind_param('i',$user_id);

  $stmt->execute();

  $orders = $stmt->get_result();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<?php include('layouts/header.php'); ?>



    <!--Account-->
    <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg col-md-12 col-sm-12">
            <p class="text-center" style="color:green"><?php if(isset($_GET['register_success'])){ echo $_GET['register_success'];} ?></p>
            <p class="text-center" style="color:green"><?php if(isset($_GET['login_success'])){ echo $_GET['login_success'];} ?></p>
                <h3 class="font-weight-bold">Account info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name:<span> <?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name']; } ?></span></p>
                    <p>Email:<span> <?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email']; } ?></span></p>
                    <p><a href="#orders" id="orders-btn">Your orders</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form" method="POST" action="account.php">
                  <p class="text-center" style="color:red"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                  <p class="text-center" style="color:green"><?php if(isset($_GET['message'])){ echo $_GET['message'];} ?></p>
                    <h3>Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label style="font-weight: bold;">Password</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Confirm Password" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn">
                    </div>
                </form>
            </div>
        </div>
    </section>



    <!--Orders-->
    <section id="orders" class="orders container my-5 py-3">
      <div class="container mt-2">
          <h2 class="font-weight-bold text-center">Your Orders</h2>
          <hr class="mx-auto">
      </div>

      <table class="mt-5 pt-5">
          <tr>
              <th>Order id</th>
              <th>Order cost</th>
              <th>Order status</th>
              <th>Order Date</th>
              <th>Order details</th>
          </tr>

          <!--product 1-->

          <?php while ($row = $orders->fetch_assoc()) { ?>
          <tr>
             <!-- <td>
                <div class="product-info">
                   <img src="assets/imgs/featured1.jpeg" alt=""> 
                  <p class="mt-3"><?php echo $row['order_id']; ?></p>
                </div> 
              </td>  -->
              <td>
                <span><?php echo $row['order_id']; ?></span>
              </td>
              
              <td>
                <span><?php echo $row['order_cost']; ?></span>
              </td>

              <td>
                <span><?php echo $row['order_status']; ?></span>
              </td>
              
              <td>
                <span><?php echo $row['order_date']; ?></span>
              </td>
              <td>
                <form method="POST" action="order_details.php">
                  <input type="hidden" value="<?php echo $row['order_status']; ?>" name="order_status"/>
                  <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id" />
                  <input type="submit" class="btn order-details-btn" value="details" name="order_details_btn"/>
              
                </form>
              </td>

          </tr>

          <?php } ?>
          
      </table>

  </section>





<?php include('layouts/footer.php'); ?>