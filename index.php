<?php include('layouts/header.php'); ?>

      <!--Tu cho nay la Home-->

      <section id="home">
        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Prices </span>This Summer.</h1>
            <p>Best offers for the best products</p>
            <form action="shop.php">
                <button>Shop Now</button>
            </form>
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
                    <form action="shop.php">
                        <button class="new-btn text-uppercase">Shop Now</button>
                    </form>
                </div>
            </div>
            <!--Cai thu 2-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/2.jpeg" alt="">
                <div class="details text-center">
                    <h2>Ao dep vcl</h2>
                    <form action="shop.php">
                        <button class="text-uppercase">Shop Now</button>
                    </form>
                </div>
            </div>
            <!--Cai thu 3-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/3.jpeg" alt="">
                <div class="details text-center">
                    <h2>Quan dep vcl</h2>
                    <form action="shop.php">
                        <button class="text-uppercase">Shop Now</button>
                    </form>   
                </div>
            </div>
        </div>
      </section>


       <!--Ao-->

    <section id="feature" class="my-5">
      <div class="container text-center mt-5 py-5">
          <br>
          <h3>Ao</h3>
          <hr class="mx-auto">
          <p style="font-size: 20px;">Ao dang cap</p>
      </div>
      <div class="row mx-auto container-fluid">

      <?php 
      include('server/get_ao.php');
       ?>

      <?php while ($row= $ao_products->fetch_assoc()) { ?>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'] ?>" alt="">
              <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
              <h4 class="p-price">$ <?php echo $row['product_price'] ?></h4>
              <a href=" <?php echo "single_product.php?product_id=", $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
          </div>
          

      <?php } ?>
      </div>
  </section>


      <!--Quan-->

      <section id="feature" class="my-5 pb=5">
      <div class="container text-center mt-5 py-5">
          <br>
          <h3>Quan</h3>
          <hr class="mx-auto">
          <p style="font-size: 20px;">Quan dinh cao</p>
      </div>
      <div class="row mx-auto container-fluid">
      <?php include('server/get_quan.php'); ?>
      <?php while ($row= $quan_products->fetch_assoc()) { ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'] ?>" alt="">
              <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
              <h4 class="p-price"><?php echo $row['product_price'] ?></h4>
              <a href=" <?php echo "single_product.php?product_id=", $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
          </div>
          <?php } ?>
      </div>
  </section>

    <!--Banner-->

    <section id="banner" class="my-5 py-5">
      <div class="container">
        <h4>Summer Time's Sale</h4>
        <h1>Bo suu tap mua he <br> Up to 50% OFF</h1>
        <form action="shop.php">
            <button class="text-uppercase">Shop Now</button>
        </form>
      </div>
    </section>

   

    <!--Balo-->

    <section id="feature" class="my-5 pb=5">
      <div class="container text-center mt-5 py-5">
          <br>
          <h3>Bag</h3>
          <hr class="mx-auto">
          <p style="font-size: 20px;">Balo dinh cao</p>
      </div>
      <div class="row mx-auto container-fluid">
      <?php include('server/get_balo.php'); ?>
      <?php while ($row= $balo_products->fetch_assoc()) { ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'] ?>" alt="">
              <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
              <h4 class="p-price"><?php echo $row['product_price'] ?></h4>
              <a href=" <?php echo "single_product.php?product_id=", $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
          </div>
          <?php } ?>
      </div>
  </section>


  <!-- Phu kien -->
  <section id="feature" class="my-5 pb=5">
      <div class="container text-center mt-5 py-5">
          <br>
          <h3>Cac mat hang dinh cao</h3>
          <hr class="mx-auto">
          <p style="font-size: 20px;">Dinh cao</p>
      </div>
      <div class="row mx-auto container-fluid">
      <?php include('server/get_phu_kien.php'); ?>
      <?php while ($row= $phu_kien_products->fetch_assoc()) { ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'] ?>" alt="">
              <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
              <h4 class="p-price"><?php echo $row['product_price'] ?></h4>
              <a href=" <?php echo "single_product.php?product_id=", $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
          </div>
          <?php } ?>
      </div>
  </section> 


  <?php include('layouts/footer.php'); ?>