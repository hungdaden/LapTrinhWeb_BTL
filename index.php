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
                <a class="nav-link" href="contact.hmtl">Contact</a>
              </li>

              <li class="nav-item">
                <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>
                <a href="login.php"><i class="fa fa-user"></i></a>
              </li>

            </ul>
            
          </div>
        </div>
      </nav>

      <!--Tu cho nay la Home-->

      <section id="home">
        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Prices </span>This Summer.</h1>
            <p>Best offers for the best products</p>
            <button>Shop Now</button>
        </div>
      </section>

      <!--Brand-->

      <section id="brand" class="container">
        <div class="row m-0">
            <img src="assets/imgs/brand1.jpeg" alt="" class="img-fluid col-lg-3 col-md-6 col-sm-12">
            <img src="assets/imgs/brand2.jpeg" alt="" class="img-fluid col-lg-3 col-md-6 col-sm-12">
            <img src="assets/imgs/brand3.jpeg" alt="" class="img-fluid col-lg-3 col-md-6 col-sm-12">
            <img src="assets/imgs/brand4.jpeg" alt="" class="img-fluid col-lg-3 col-md-6 col-sm-12">
        </div>
      </section>

      <!--New-->

      <section id="new" class="w-100 ">
        <div class="row p-0 m-0">
            <!--Cai dau tien-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/1.jpeg" alt="">
                <div class="details text-center">
                    <h2>Balo dep vcl</h2>
                    <button class="new-btn text-uppercase">Shop Now</button>
                </div>
            </div>
            <!--Cai thu 2-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/2.jpeg" alt="">
                <div class="details text-center">
                    <h2>Ao dep vcl</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
            <!--Cai thu 3-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/3.jpeg" alt="">
                <div class="details text-center">
                    <h2>Quan dep vcl</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
        </div>
      </section>

      <!--Feature-->

      <section id="feature" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <br>
            <h2>Our Feature</h2>
            <hr class="mx-auto">
            <p style="font-size: 20px;">Cac san pham dinh cao</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/featured1.jpeg" alt="">
                <h5 class="p-name">Hut Di</h5>
                <h4 class="p-price">$200</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/featured2.jpeg" alt="">
                <h5 class="p-name">Hut Di</h5>
                <h4 class="p-price">$200</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/featured3.jpeg" alt="">
                <h5 class="p-name">Hut Di</h5>
                <h4 class="p-price">$200</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/featured4.jpeg" alt="">
                <h5 class="p-name">Hut Di</h5>
                <h4 class="p-price">$200</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
        </div>
    </section>

    <!--Banner-->

    <section id="banner" class="my-5 py-5">
      <div class="container">
        <h4>Summer Time's Sale</h4>
        <h1>Bo suu tap mua he <br> Up to 50% OFF</h1>
        <button class="text-uppercase">Shop Now</button>
      </div>
    </section>

    <!--Feature/Clothes-->

    <section id="feature" class="my-5">
      <div class="container text-center mt-5 py-5">
          <br>
          <h3>Quan ao gi do</h3>
          <hr class="mx-auto">
          <p style="font-size: 20px;">quan ao dang cap</p>
      </div>
      <div class="row mx-auto container-fluid">

      <?php 
      include('<server/get_featured_products.php');


       ?>

      <?php while ($row= $featured_products->fetch_assoc()) { ?>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'] ?>" alt="">
              <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
              <h4 class="p-price">$ <?php echo $row['product_price'] ?></h4>
              <a href=" <?php echo "single_product.php?product_id=", $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
          </div>
          

      <?php } ?>
      </div>
  </section>

    <!--Bag-->

    <section id="feature" class="my-5 pb=5">
      <div class="container text-center mt-5 py-5">
          <br>
          <h3>Bag</h3>
          <hr class="mx-auto">
          <p style="font-size: 20px;">Balo dinh cao</p>
      </div>
      <div class="row mx-auto container-fluid">
      <?php include('server/get_bags.php'); ?>
      <?php while ($row= $bag_products->fetch_assoc()) { ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'] ?>" alt="">
              <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
              <h4 class="p-price"><?php echo $row['product_price'] ?></h4>
              <button class="buy-btn">Buy Now</button>
          </div>
          <?php } ?>
      </div>
  </section>


  <?php include('layouts/footer.php'); ?>