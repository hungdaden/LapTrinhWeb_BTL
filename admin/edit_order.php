<?php include('header.php'); ?>

<?php

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();

    $order = $stmt->get_result();
}else if(isset($_POST['edit_order'])){

  $order_status = $_POST['order_status'];
  $order_id = $_POST['order_id'];
  
  $stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE order_id = ?");
  $stmt->bind_param('si', $order_status, $order_id);
  
  
  if($stmt->execute()){
    header('location: index.php?order_updated=Order has been edited SUCCESSFULLY');
  }else{
    header('location: products.php?order_failed=Order has been editted FAILFULLY');
  }


}else{
  header('index.php');
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
                <h2 class="tm-block-title d-inline-block">Edit Order</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form id="edit-order-form" method="POST" action="edit_order.php" class="tm-edit-product-form">
                
                <?php foreach($order as $r) { ?>

                <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></?php></p>
                  <div class="form-group mb-3">

                    <label style="font-weight: bold; font-size: 24px;"
                      >Order ID
                    </label>
                    <p style="font-size: 24px;" class="my-4"><?php echo $r['order_id'];?></p>
                  </div>
                  <div class="form-group mb-3">

                    <label style="font-weight: bold; font-size: 24px;"
                      >Order Price
                    </label>
                    <p style="font-weight: bold; font-size: 24px;" class="my-4"><?php echo "$" . $r['order_cost'];?></p>
                  </div>

                  <input type="hidden" name="order_id" value="<?php echo $r['order_id'];?>"/>

                  <div class="form-group mb-3">
                    <label
                      >Order Status</label
                    >
                    <select
                      class="custom-select tm-select-accounts" required
                      name="order_status"
                    >
                      <option>Select status</option>
                      <option value="Not Paid" <?php if($r['order_status'] == 'Not Paid'){ echo "Selected";} ?> >Not Paid</option>
                      <option value="Paid" <?php if($r['order_status'] == 'Paid'){ echo "Selected";} ?> >Paid</option>
                      <option value="Shipped" <?php if($r['order_status'] == 'Shipped'){ echo "Selected";} ?> >Shipped</option>
                      <option value="Delivered" <?php if($r['order_status'] == 'Delivered'){ echo "Selected";} ?> >Delivered</option>
                    </select>
                  </div>
                  <div class="row">
                      <div class="form-group my-3">
                          <label
                            >Order Date
                          </label>
                          <p class="my-4"><?php echo $r['order_date'];?></p>
                        </div>
                  </div>
                  
              </div>
              <div class="col-12">
                <button type="submit" name="edit_order" class="btn btn-primary btn-block text-uppercase">Update Now</button>
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
