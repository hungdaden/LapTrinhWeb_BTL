<?php include('layouts/header.php'); ?>

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