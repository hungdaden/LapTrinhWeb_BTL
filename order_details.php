
<?php

include('server/connection.php');

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){

    $order_id = $_POST['order_id'];

    $order_status = $_POST['order_status'];

    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");

    $stmt->bind_param("i", $order_id);

    $stmt->execute();

    $order_details = $stmt->get_result();
}else{
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
                <a class="nav-link" href="index.php">Home</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
              </li>

              <li class="nav-item">
                <a href="cart.php">
                  <i class="fa fa-shopping-cart">
                  <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0){ ?>
                      <span class="cart-quantity"><?php echo $_SESSION['quantity']; ?></span>

                  <?php } ?>
                  </i>
                </a>
                <a href="login.php"><i class="fa fa-user"></i></a>
              </li>

            </ul>
            
          </div>
        </div>
      </nav>

      <!--Orders Details-->
    <section id="orders" class="orders container my-5 py-3">
      <div class="container mt-5">
          <h2 class="font-weight-bold text-center">Order Details</h2>
          <hr class="mx-auto">
      </div>

      <table class="mt-5 pt-5 mx-auto">
          <tr>
              <th>Produce</th>
              <th>Price</th>
              <th>Quantity</th>
          </tr>

          <?php while($row = $order_details->fetch_assoc()) { ?>

          <!--product 1-->

          <tr>
              <td>
                <div class="product-info">
                   <img src="assets/imgs/<?php echo $row['product_image'];?>"/>
                  <p class="mt-3"><?php echo $row['product_name'];?></p>
                </div>
                
              </td>
              
              <td>
                <span>$<?php echo $row['product_price'];?></span>
              </td>

              <td>
                <span><?php echo $row['product_quantity'];?></span>
              </td>

          </tr>

          <?php } ?>
          
      </table>

      <?php if($order_status == "Not Paid"){ ?>

          <form style="float: right;">
            <input type="submit" class="paynow_btn" value="Pay Now">
          </form>

        <?php } ?>

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
