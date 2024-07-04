<?php 

include('server/connection.php');



if (isset($_POST['search'])) {

  $category = $_POST['category'];

  $price = $_POST['price'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=?");

  $stmt->bind_param("si",$category,$price);

  $stmt->execute();

  $products = $stmt->get_result();

} else {
  $stmt = $conn->prepare("SELECT * FROM products");

  $stmt->execute();

  $products = $stmt->get_result();
}





?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
      .product img{
        width: 100%;
        height: auto;
        box-sizing: border-box;
        object-fit: cover;
      }

      .pagination a{
        color: black;
      }

      .pagination li:hover a{
        color: white;
        background-color: black;
      }
    </style>
</head>
<body>

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
                <a class="nav-link" href="shop.html">Shop</a>
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
      
      <!--Search-->
      <section id="search" class="my-5 py-5 ms-2">
        <div class="container mt-5 py-5">
          <p>Search Products</p>
          <hr>
        </div>

            <form action="shop.php" method="POST">
              <div class="row mx-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">


                  <p>Category</p>
                    <div class="form-check">
                      <input class="form-check-input" value="shoes" type="radio" name="category" id="category_one">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Shoes
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" value="coats" type="radio" name="category" id="category_two" checked>
                      <label class="form-check-label" for="flexRadioDefault2">
                        Coats
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" value="watches" type="radio" name="category" id="category_two" checked>
                      <label class="form-check-label" for="flexRadioDefault2">
                        Watches
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" value="bags" type="radio" name="category" id="category_two" checked>
                      <label class="form-check-label" for="flexRadioDefault2">
                        Bags
                      </label>
                    </div>

                </div>

              </div>

              <div class="row mx-auto container mt-5">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Price</p>
                    <input type="range" class="form-range w-50" name="price" value="100" min="1" max="1000" id="customRange2">
                    <div class="w-50">
                      <span style="float: left;">1</span>
                      <span style="float: right;">1000</span>
                    </div>
                </div>
              </div>

              <div class="form-group my-3 mx-3">
                <input type="submit" name="search" value="Search" class="btn btn-primary">
              </div>

            </form>
      </section>



      <!--Feature-->

      <section id="feature" class="my-5 py-5">
        <div class="container text-center mt-5 py-5">
            <br>
            <h3>Our Products</h3>
            <hr class="mx-auto">
            <p style="font-size: 20px;">Cac san pham dinh cao</p>
        </div>




        <div class="row mx-auto container">

          <?php while ($row = $products->fetch_assoc()) { ?>


            <div onclick="window.location.href='single_product.php';" class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="">
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
                <a class="btn buy-btn" href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>">Buy Now</a>
            </div>
            

          <?php } ?>

      <nav aria-label="Page navigation example"></nav>
      <ul class="pagination mt-5">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>

        </div>
    </section>






<?php include('layouts/footer.php'); ?>