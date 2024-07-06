<?php include('header.php'); ?>

<?php

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param('i', $product_id);
    $stmt->execute();

    $products = $stmt->get_result();
}else if(isset($_POST['edit_btn'])){

  $product_id = $_POST['product_id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $offer = $_POST['offer'];
  $color = $_POST['color'];
  $category = $_POST['category'];

  $stmt = $conn->prepare("UPDATE products SET product_name = ?, product_description = ?, product_price = ?,
  product_special_offer = ?, product_color = ?, product_category = ? WHERE product_id = ?");
  $stmt->bind_param('ssssssi', $title, $description, $price, $offer, $color, $category, $product_id);
  
  
  if($stmt->execute()){
    header('location: products.php?edit_success_message=Product has been edited SUCCESSFULLY');
  }else{
    header('location: products.php?edit_failure_message=Product has been editted FAILFULLY');
  }


}else{
  header('products.php');
  exit();
}
?>

    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
          <?php include('sidemenu.php') ?>
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Edit Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form id="edit-form" enctype="multipart/form-data" method="POST" action="edit_product.php" class="tm-edit-product-form">
                  <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></?php></p>
                  <div class="form-group mb-3">

                  <?php foreach($products as $product) { ?>

                    <input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>"/>

                    <label
                      >Title
                    </label>
                    <input
                      id="product_name"
                      placeholder="Title"
                      name="title"
                      type="text"
                      value="<?php echo $product['product_name']?>"
                      class="form-control"
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      >Description</label>
                    <input                    
                      class="form-control validate tm-small"
                      type="text"
                      id="product-desc"
                      name="description"
                      placeholder="Description"
                      required
                      value="<?php echo $product['product_description']?>"       >
                    </input>
                  </div>
                  <div class="form-group mb-3">
                    <label
                      >Category</label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="category"
                      name="category"
                    >
                      <option>Select category</option>
                      <option value="Ao" selected>Ao</option>
                      <option value="Quan">Quan</option>
                      <option value="Balo">Balo</option>
                      <option value="Phu_kien">Phu Kien</option>
                    </select>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            >Price
                          </label>
                          <input
                            id="product_price"
                            name="price"
                            type="text"
                            value="<?php echo $product['product_price']?>"
                            class="form-control"
                            placeholder="Price"
                            required
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            >Color
                          </label>
                          <input
                            id="product_color"
                            name="color"
                            type="text"
                            value="<?php echo $product['product_color']?>"
                            class="form-control"
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            >Special Offer/Sale
                          </label>
                          <input
                            id="product_offer"
                            name="offer"
                            type="number"
                            value="<?php echo $product['product_special_offer']?>"
                            class="form-control"
                          />
                        </div>
                  </div>
                  
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-edit mx-auto">
                  <img src="<?php echo "../assets/imgs/". $product['product_image']; ?>" style="width: 300px; height: 400px;" alt="Product image" class="img-fluid d-block mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById('fileInput').click();"
                  ></i>
                </div>
                <div class="custom-file mt-2 mb-2">
                  <input id="fileInput" type="file" style="display:none;" />
                  <input
                    type="button"
                    class="btn btn-primary btn-block"
                    value="CHANGE IMAGE NOW"
                    onclick="document.getElementById('fileInput').click();"
                  />
                </div>
              </div>
              <div class="col-12">
                <button type="submit" name="edit_btn" class="btn btn-primary btn-block text-uppercase">Update Now</button>
              </div>

              <?php } ?>

            </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>

    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>
