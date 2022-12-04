<?php require '../config.php';  ?>
<?php require DIRA . 'inc/header.php';  ?>
<?php require DIRA . 'inc/nav.php';  ?>


    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All Services</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>


                <a href="<?php echo BURLA . "services/all.php" ?>">
                    <h3><?php echo count_row("Services"); ?> services</h3>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All Cities</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="<?php echo BURLA . "city_setting/city.php" ?>">
                    <h3><?php echo count_row("city"); ?> cities</h3>
                </a>
            </div>
        </div>
    </div>


    <div class="col-sm-6 mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All Orders</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="<?php echo BURL . "orders/order.php" ?>">
                    <h3><?php echo count_row("orders"); ?> orders</h3>
                </a>
            </div>
        </div>
    </div>








<?php require DIRA . '/inc/footer.php';  ?>