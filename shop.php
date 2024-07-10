<?php 

include('server/connection.php');


if (isset($_POST['search'])) {

  if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
    // neu user chon so trang
        $page_no = $_GET['page_no'];
    } else{
      // default
        $page_no = 1;
    }


    $category = $_POST['category'];
    $price = $_POST['price'];

    $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products WHERE product_category=? AND product_price<=?");
    $stmt1->bind_param('si',$category,$price);

    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();


    // products per page
    $total_records_per_page = 8;

    $offset = ($page_no-1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    
    $next_page = $page_no + 1;

    $adjacents = "2";

    $total_no_of_pages = ceil($total_records/$total_records_per_page);


    // get all products

    $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=? LIMIT $offset,$total_records_per_page");
    $stmt2->bind_param("si",$category,$price);

    $stmt2->execute();

    $products = $stmt2->get_result();

} else {

      if(isset($_GET['page_no']) && $_GET['page_no'] != ""){

        $page_no = $_GET['page_no'];
      } else {
        $page_no = 1;
      }



      $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
      $stmt1->execute();
      $stmt1->bind_result($total_records);
      $stmt1->store_result();
      $stmt1->fetch();

      // products per page
      $total_records_per_page = 8;
      $offset = ($page_no-1) * $total_records_per_page;

      $previous_page = $page_no -1;
      $next_page = $page_no +1;

      $adjacents = "2";

      $total_no_of_pages = ceil($total_records/$total_records_per_page);

      // get all products

      $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
      $stmt2->execute();
      $products = $stmt2->get_result();
    

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

<?php include('layouts/header.php'); ?>
      <div class="container" style="display: flex; flex-direction: row">
            <!--Search-->
        <div class="sidebar" style="width: 10%; padding: 20px; box-shadow: 2px 0 5px rgba(0,0,0,0.1);">
          <section id="search" class="my-5 py-5 ms-2">
            <div class="container mt-5 py-5">
              <p style="font-weight: bold;">Search Products</p>
              <hr>
            </div>

                <form action="shop.php" method="POST">
                  <div class="row mx-auto container">
                    <div class="col-lg-12 col-md-12 col-sm-12">


                      <p>Category</p>
                        <div class="form-check">
                          <input class="form-check-input" value="Ao" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=='Ao'){echo 'checked';} ?>>
                          <label class="form-check-label" for="flexRadioDefault1">
                            Ao
                          </label>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" value="Quan" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=='Quan'){echo 'checked';} ?>>
                          <label class="form-check-label" for="flexRadioDefault2">
                            Quan
                          </label>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" value="Balo" type="radio" name="category" id="category_two" <?php if(isset($category)&& $category=='Balo'){echo 'checked';} ?>>
                          <label class="form-check-label" for="flexRadioDefault2">
                            Balo
                          </label>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" value="Phu_kien" type="radio" name="category" id="category_two" <?php if(isset($category)&& $category=='Phu_kien'){echo 'checked';} ?>>
                          <label class="form-check-label" for="flexRadioDefault2">
                            Phu kien
                          </label>
                        </div>

                    </div>

                  </div>

                  <div class="row mx-auto container mt-5">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p>Price</p>
                        <input type="range" class="form-range w-50" name="price" value="<?php if(isset($price)) {echo $price;} else{echo "100";} ?>" min="1" max="1000" id="customRange2">
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
        </div>


      <!--Feature-->
        <div class="main-content" style="width: 90%; padding:20px;">
          <section id="feature" class="my-0 py-5">
            <div class="container text-center mt-0 py-5">
                <br>
                <h3>Our Products</h3>
                <hr class="mx-auto">
                <p style="font-size: 20px;">Product Collections</p>
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

          <nav aria-label="Page navigation example">
          <ul class="pagination mt-5 mx-auto">
                
            <li class="page-item <?php if($page_no <=1){echo 'disabled';} ?>">
              <a class="page-link" href="<?php if($page_no <= 1){echo '#';}else { echo "?page_no=".($page_no-1);} ?>">Previous</a>
            </li>


            <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
            <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>
            <li class="page-item"><a class="page-link" href="?page_no=3">3</a></li>

            <?php if( $page_no >=4) {?>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no;?>"><?php echo $page_no; ?></a></li>
            <?php } ?> 


            <li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';}?>">
              <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';} else{echo "?page_no=".($page_no+1);} ?>">Next</a>
            </li>
          </ul>
          </nav>
            </div>
          </section>
          </div>
      </div>
      





<?php include('layouts/footer.php'); ?>