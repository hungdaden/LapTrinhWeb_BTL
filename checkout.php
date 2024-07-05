<?php 

session_start();

if (!empty($_SESSION['cart']) ) {
  // let user in





} else {
 // send user to home 

    header('location: index.php');

}









?>







<?php include('layouts/header.php'); ?>

    <!--Checkout Page-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Checkout</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            
            <form id="checkout-form" method="POST" action="payment.php">

                <div class="form-group checkout-small-element">
                    <label>Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required/>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Email</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required/>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Phone Number</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone Number" required/>
                </div>
                <div class="form-group checkout-small-element">
                    <label>City</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required/>
                </div><div class="form-group checkout-large-element">
                    <label>Address</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required/>
                </div>
                <div class="form-group checkout-btn-container">
                    <p>Total amount: $ <?php echo $_SESSION['total']; ?></p>
                    <input type="submit" class="btn" id="checkout-btn" name= "place_order" value="Place Order"/>
                </div>
            </form>
        </div>
    </section>



    <?php include('layouts/footer.php'); ?>