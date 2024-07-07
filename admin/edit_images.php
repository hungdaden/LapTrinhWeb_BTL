<?php include('header.php'); ?>


<?php
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $product_name = $_GET['product_name'];
} else {
    header('location: products.php');
}
?>

<div class="container-fluid">
    <div class="row" style="min-heigh: 1000px">
        
        <?php include('sidemenu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-18 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="">

                    </div>

                </div>

            </div>

        </main>

    </div>

</div>