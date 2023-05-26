<?php
include('layouts/header.php');
?>

<link rel="stylesheet" href="../assets/css/admin-index.css">

<div class="container">
    <h1>Dasboard</h1>

    <div class="row row-cols-1 row-cols-md-4 g-1 mt-5">
        <div class="col">
            <div class="card mb-3 kartu" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">TOTAL TRANSACTION</h5>
                    <hr>
                    <h4 class="card-text"><i class="fa-solid fa-bag-shopping"></i>7</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3 kartu" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">TOTAL INCOME</h5>
                    <hr>
                    <h4 class="card-text"><i class="fa-solid fa-rupiah-sign"></i>1.800.000</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3 kartu" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">PAID</h5>
                    <hr>
                    <h4 class="card-text"><i class="fa-solid fa-receipt"></i>5</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3 kartu" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">NOT PAID</h5>
                    <hr>
                    <h4 class="card-text"><i class="fa-solid fa-comments-dollar"></i>2</h4>
                </div>
            </div>
        </div>
    </div>


</div>

<?php
include('layouts/footer.php');
?>