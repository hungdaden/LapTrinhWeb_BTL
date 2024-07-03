<?php

session_start();

include('server/connection.php');

if(isset($_POST['register'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  // check confirmpassword co giong password hay khong
  if($password !== $confirmPassword){
    header('location: register.php?error=passwords dont match');
  }

  // check password co ngan hon 6 ki tu hay khong
  else if(strlen($password) < 6){
    header('location: register.php?error=Passwords must be at least 6 characters');
  }
  // Neu khong co loi gi
  else{
  // check xem email da ton tai chua
  $statement1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email = ?");
  $statement1->bind_param('s', $email);
  $statement1->execute();
  $statement1->bind_result($num_rows);
  $statement1->store_result();
  $statement1->fetch();

  // neu email da ton tai thi bo qua va bao loi
  if($num_rows != 0){
    header('location: register.php?error=Da ton tai nguoi dung su dung email nay');
  }
  // neu chua ton tai email nay
  else{
  // tao user moi
  $statement = $conn->prepare("INSERT INTO users (user_name, user_email, user_password)
                              VALUES (?,?,?)");

  $statement->bind_param('sss', $name, $email, md5($password));

  // neu tao user moi thanh cong thi dang nhap va chuyen den trang account
  if($statement1->execute()){
    $_SESSION['user_email'] = $email;
    $_SESSION['user_name'] = $name;
    $_SESSION['logged_in'] = true;
    header('location: account.php?register=You are register successfully');
    }else{
      // neu tao tai khoan khong thanh cong
      header('location: register.php?error= Could not create an account');
    }
  }
}
// Neu da dang ki, chuyen thang den accout
}else if(isset($_SESSION['logged_in'])){

  header('location: account.php');
  exit;

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



    <!--Register-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST" action="register.php">
              <p style="color: red;"><?php if(isset($_GET['error'])) {echo $_GET['error'];}?></p>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required/>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="ConfirmPassword" required/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="register-btn" name="register" value="Register"/>
                </div>
                <div class="form-group">
                    <a id="login-url" href="login.php" class="btn">Do you have an account? Login</a>
                </div>
            </form>
        </div>
    </section>









    <!--footre-->

    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo" src="https://theme.hstatic.net/1000306633/1001194548/14/logo.png?v=206" />
            <p class="pt-3">We provide the best products for the most affordable pricess</p>

          </div>
          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Featured</h5>
            <ul class="text-uppercase">
              <li><a href="#">men</a></li>
              <li><a href="#">women</a></li>
              <li><a href="#">boys</a></li>
              <li><a href="#">girls</a></li>
              <li><a href="#">new arrivals</a></li>
              <li><a href="#">clothes</a></li>
            </ul>
          </div>

          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
              <h5 class="pb-2">Contact Us</h5>
              <div>
                <h6 class="text-uppercase">Adress</h6>
                <p>Trieu Khuc, Thanh Xuan, Ha Noi</p>
              </div>
          
              <div>
                <h6 class="text-uppercase">Phone</h6>
                <p>1900 10 0 biet</p>
              </div>
              <div>
                <h6 class="text-uppercase">Email</h6>
                <p>info@email.com</p>
              </div>
          </div>

          
          </div>
        </div>



        <div class="copyright mt-5">
          <div class="row container mx-auto">
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <img style="height: 100px;" style="width: 150px;" src="assets/imgs/payment.jpg" />
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
              <p>Group 4 @ 2024 All Right Reserved</p>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
          </div>
        </div>

      </footer>



    <script src="https://kit.fontawesome.com/2f3e6ad59f.js" crossorigin="anonymous"></script>
</body>
</html>