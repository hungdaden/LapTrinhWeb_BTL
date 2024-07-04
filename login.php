<?php include('layouts/header.php'); ?>



    <!--Login-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Login</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="login-form">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="login-btn" value="Login"/>
                </div>
                <div class="form-group">
                    <a id="register-url" class="btn">Don't have account? Register</a>
                </div>
            </form>
        </div>
    </section>









<?php include('layouts/footer.php'); ?>