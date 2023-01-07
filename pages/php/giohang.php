<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
    rel="stylesheet"
    />
    <style>
    @media (min-width: 1025px) {
    .h-custom {
    height: 100vh !important;
    }
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
    }

    .card-registration .select-arrow {
    top: 13px;
    }

    .bg-grey {
    background-color: #eae8e8;
    }

    @media (min-width: 992px) {
    .card-registration-2 .bg-grey {
    border-top-right-radius: 16px;
    border-bottom-right-radius: 16px;
    }
    }

    @media (max-width: 991px) {
    .card-registration-2 .bg-grey {
    border-bottom-left-radius: 16px;
    border-bottom-right-radius: 16px;
    }
    }
    </style>
</head>
<body>
   <?php include('../html/header.html') ?> 

   <?php
        if(isset($_SESSION['cart'])){

        }
   ?>
   <section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
                <div class="row g-0">
                <div class="col-lg-8">
                    <div class="p-5">
                    
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <h3 class="fw-bold mb-0 text-black">Product Cart</h3>
                    </div>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $i = 0;
                        $total_product = 0;
                        $total_product_list = 0;
                        foreach ($_SESSION['cart'] as $cart_item) {
                            $total_product = $cart_item['quantity_product'] * $cart_item['price_product'];
                            $total_product_list += $total_product;
                            $i++;
                    ?>
                    <hr class="my-4">
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                        <img
                            src="../../admin/uploads/<?=$cart_item['avatar']?>"
                            class="img-fluid rounded-3">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                        <h6 class="text-black mb-0"><?=$cart_item['name_product']?></h6>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                        </button>

                        <input id="form1" min="0" name="quantity" value="1" type="number"
                            class="form-control form-control-sm" />

                        <button class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="fas fa-plus"></i>
                        </button>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class="mb-0"><?=$cart_item['price_product']?></h6>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                        </div>
                    </div>
                    <?php
                        }
                    }else {
                        # code...
                    }
                    ?>

                    <hr class="my-4">

                    <div class="pt-5">
                        <h6 class="mb-0"><a href="online_gift_shop.php" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Back to gift shop</a></h6>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 bg-grey">
                    <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">
                    
                    <div class="d-flex justify-content-between mb-5">
                        <h7 class="text-uppercase">Total price animal</h7>
                        <h7>???</h7>
                    </div>

                    <div class="d-flex justify-content-between mb-5">
                        <h7 class="text-uppercase">Total price product</h7>
                        <h7>
                            <?php
                                echo '$'.number_format($total_product_list, 0,',','.');
                            ?>
                        </h7>
                    </div>

                    <div class="d-flex justify-content-between mb-5">
                        <h5 class="text-uppercase">Total price</h5>
                        <h5>???</h5>
                    </div>

                    <button type="button" class="btn btn-dark btn-block btn-lg"
                        data-mdb-ripple-color="dark">Register</button>

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>