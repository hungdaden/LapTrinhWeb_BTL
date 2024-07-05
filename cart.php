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

    $total_price = 0;

    $total_quantity = 0;

    foreach ($_SESSION['cart'] as $key => $value) {
      
      $product = $_SESSION['cart'][$key];

      $price = $product['product_price'];

      $quantity = $product['product_quantity'];

      $total_price = $total_price + ($price * $quantity);
      $total_quantity = $total_quantity + $quantity;


    }

    $_SESSION['total'] = $total_price;
    $_SESSION['quantity'] = $total_quantity;

}




?>







<?php include('layouts/header.php'); ?>




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
                            <p id="price"><?php echo $value['product_name']; ?></p>
                            <medium><span>$</span><?php echo $value['product_price']; ?></medium>
                            <br>
                            <form method="POST" action="cart.php">

                            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>"/>

                            <input type="submit" class="remove-btn" name="remove_product" value="Remove"/>
                        
                            </form>
                            
                        </div>
                    </div>
                </td>


                <td>
                    
                    <form method="POST" action="cart.php">
                    
                    <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                    <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'];?>"/>
                    <input type="submit" class="edit-btn" value="Edit" name="edit_quantity"/>
                    
                    </form>
                    
                </td>

                <td>
                    <span class="product-price">$</span>
                    <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
                </td>
            </tr>

            
              <?php } ?>

            
        </table>




        <div class="cart-total">
            <table>

                <tr>
                    <td class="cart-total-css">Total</td>
                    <td class="cart-total-css">$<?php echo $_SESSION['total']; ?></td>
                </tr>
            </table>
        </div>



        <div class="checkout-container">
          <form method="POST" action="checkout.php">
            <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">       
          </form>
        </div>


    </section>









<?php include('layouts/footer.php'); ?>