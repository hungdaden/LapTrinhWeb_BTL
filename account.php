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



    <!--Day la navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
    <div class="container">
      <img style="height: 25px;" style="width: 50px;" src="//theme.hstatic.net/1000306633/1001194548/14/logo.png?v=206" alt="">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#">Shop</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>

          <li class="nav-item">
            <i class="fa fa-shopping-cart"></i>
            <i class="fa fa-user"></i>
          </li>

        </ul>
        
      </div>
    </div>
    </nav>



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
    <section id="orders" class="orders container my-5 py-5">
      <div class="container mt-2">
          <h2 class="font-weight-bold text-center">Your Orders</h2>
          <hr class="mx-auto">
      </div>

      <table class="mt-5 pt-5">
          <tr>
              <th>Product</th>
              <th>Date</th>
          </tr>

          <!--product 1-->
          <tr>
              <td>
                <div class="product-info">
                  <img src="assets/imgs/featured1.jpeg" alt="">
                  <p class="mt-3">Brown Hoodie</p>
                </div>  
              </td>

              <td>
                <span>June 28 2024</span>
              </td>

          </tr>
          
      </table>

  </section>





<?php include('layouts/footer.php'); ?>