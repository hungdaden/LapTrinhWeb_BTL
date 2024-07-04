<?php include('layouts/header.php'); ?>


    <!--Account-->
    <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Account info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name:<span> Hung</span></p>
                    <p>Email:<span> hunghoang123@gmail.com</span></p>
                    <p><a style="text-decoration: none;" href="" id="orders-btn">Your orders</a></p>
                    <p><a href="" id="logout-btn">Logout</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form">
                    <h3>Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label style="font-weight: bold;">Password</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Confirm Password" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" class="btn" id="change-pass-btn">
                    </div>
                </form>
            </div>
        </div>
    </section>



    <!--Orders-->
    <section class="orders container my-5 py-5">
      <div class="container mt-2">
          <h2 class="font-weight-bold text-center">Your Orders</h2>
          <hr class="mx-auto">
      </div>

      <table class="mt-5 pt-5">
          <tr>
              <th>Product</th>
              <th>Date</th>
          </tr>

          <!--product 1-->
          <tr>
              <td>
                <div class="product-info">
                  <img src="assets/imgs/featured1.jpeg" alt="">
                  <p class="mt-3">Brown Hoodie</p>
                </div>  
              </td>

              <td>
                <span>June 28 2024</span>
              </td>

          </tr>
          
      </table>

  </section>





<?php include('layouts/footer.php'); ?>