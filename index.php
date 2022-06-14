<?php
$title = 'Index';
include_once 'layout/header.php';
include_once 'midleware/auth.php';
include_once 'layout/navbar.php';
?>

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card w-100">
                <img class="card-img-top" src="images/products/dell.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">Laptop</h4>
                    <p class="card-text">15000 EGP</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card w-100">
                <img class="card-img-top" src="images/products/a50.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">Mobile</h4>
                    <p class="card-text">15000 EGP</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card w-100">
                <img class="card-img-top" src="images/products/tv55.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">Tv</h4>
                    <p class="card-text">10000 EGP</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once "layout/footer.php";
?>