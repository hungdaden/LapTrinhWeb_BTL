<?php 

session_start();

if (isset($_POST['add_to_cart'])) {

      // user da add product
    if (isset($_SESSION['cart'])) {

      $products_array_ids = array_column($_SESSION['cart'],"product_id");
      // check xem da them chua
      if (!in_array($_POST['product_id'], $products_array_ids) ) {
        

              $product_id = $_POST['product_id'];

              $product_array = array(
                              'product_id' => $_POST['product_id'],
                              'product_name' => $_POST['product_name'],
                              'product_price' => $_POST['product_price'],
                              'product_image' => $_POST['product_image'],
                              'product_quantity' => $_POST['product_quantity']
              );

              $_SESSION['cart'][$product_id] = $product_array;



      } else {
        
           echo '<script>alert("Product was already to cart");</script>';

      }

      // product dau tien
    }else {

      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image'];
      $product_quantity = $_POST['product_quantity'];

      $product_array = array(
                      'product_id' => $product_id,
                      'product_name' => $product_name,
                      'product_price' => $product_price,
                      'product_image' => $product_image,
                      'product_quantity' => $product_quantity
      );

      $_SESSION['cart'][$product_id] = $product_array;


      // total
      
      
    }
    
    calculateTotalCart();
    
    // remove product
} else if(isset($_POST['remove_product'])) {
      
      $product_id = $_POST['product_id'];
      unset($_SESSION['cart'][$product_id]);

      calculateTotalCart();
// sua so luong
} else if(isset($_POST['edit_quantity'])){

  // lay id va so luong cua product tu form
  $product_id = $_POST['product_id'];
  $product_quantity = $_POST['product_quantity'];

  // lay product theo id tu session cart vao mang 1 chieu 1 product
  $product_array = $_SESSION['cart'][$product_id];

  // update so luong product
  $product_array['product_quantity'] = $product_quantity;

  // update lai product trong array
  $_SESSION['cart'][$product_id] = $product_array;

  calculateTotalCart();

}


 else {
   // header('location: index.php');
}



function calculateTotalCart(){

    $total = 0;

    foreach ($_SESSION['cart'] as $key => $value) {
      
      $product = $_SESSION['cart'][$key];

      $price = $product['product_price'];

      $quantity = $product['product_quantity'];

      $total = $total + ($price * $quantity);


    }

    $_SESSION['total'] = $total;

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
              <i class="fa fa-shopping-cart"></i>
            </a>
            <i class="fa fa-user"></i>
          </li>

        </ul>
        
      </div>
    </div>
    </nav>




    <!--Cart-->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Your Cart</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <!--product 1-->

            <?php foreach ($_SESSION['cart'] as $key => $value) { ?>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['product_image']; ?>" />
                        <div>
                            <p><?php echo $value['product_name']; ?></p>
                            <small><span>$</span><?php echo $value['product_price']; ?></small>
                            <br>
                            <form method="POST" action="cart.php">

                            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>"/>

                            <input type="submit" class="remove-btn" name="remove_product" value="remove"/>
                        
                            </form>
                            
                        </div>
                    </div>
                </td>


                <td>
                    
                    <form method="POST" action="cart.php">
                    
                    <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                    <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'];?>"/>
                    <input type="submit" class="edit-btn" value="edit" name="edit_quantity"/>
                    
                    </form>
                    
                </td>

                <td>
                    <span>$</span>
                    <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
                </td>
            </tr>

            
              <?php } ?>

            
        </table>




        <div class="cart-total">
            <table>

                <tr>
                    <td>Total</td>
                    <td>$ <?php echo $_SESSION['total']; ?></td>
                </tr>
            </table>
        </div>



        <div class="checkout-container">
          <form method="POST" action="checkout.php">
            <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">
            
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