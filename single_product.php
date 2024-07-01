<?php 

include('server/connection.php');

if (isset($_GET['product_id'])) {

  $product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");

  $stmt->bind_param("i",$product_id);

  $stmt->execute();

  $product = $stmt->get_result();

} else {

  header('location: index.php');

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
        <div class="container-fluid">
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
                <i class="fa-solid fa-cart-shopping"></i>
                <i class="fa fa-user"></i>
              </li>

            </ul>
            
          </div>
        </div>
    </nav>

    <!-- Feature vao dayyyyyy 38/13:50 -->

    <!--Single product-->
    <section class="container single_product my-5 pt-5">
        <div class="row mt-5">

        <?php while($row = $product->fetch_assoc()) { ?>


            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/imgs/ <?php echo $row['product_image']; ?>" id="mainImg"/>
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img"/>
                    </div>
                </div>
            </div>

            

            <div class="col-lg-6 col-md-12 col-12">
                <h6>Men/Shoes</h6>
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2>$ <?php echo $row['product_price']; ?></h2>
                <input type="number" value="1"/>
                <button class="buy-btn">Add To Cart</button>
                <h4 class="mt-5 mb-5">Product details</h4>
                <span><?php echo $row['product_description']; ?></span>
            </div>

            <?php } ?>

        </div>
    </section>


    <!--Footer-->
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

    <script>

        var mainImg = document.getElementById("mainImg");
        var smallImg = document.getElementsByClassName("small-img");

        for(let i=0; i<4; i++){
                smallImg[i].onclick = function(){
                mainImg.src = smallImg[i].src;
            }
        }

        




    </script>
</body>
</html>