<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart_product</title>
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

   <section class="h-100" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
                <div class="row g-0">
                <div class="col-lg-8">
                    <div class="p-5">
                    
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <h5 class="fw-bold mb-0 text-black">
                            Xin chào 
                            <?php 
                                if(isset($_SESSION['users']))
                                {
                                    echo $_SESSION['users']. ',';
                                } 
                            ?>
                        </h5>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <h3 class="fw-bold mb-0" style="color: green;">
                            Order Success. Please continue shopping!
                        </h3>
                    </div>

                    <div class="pt-5">
                        <h6 class="mb-0"><a href="adopt_animal.php" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Back to Adopt Animal</a></h6>
                    </div>

                    <div class="pt-5">
                        <h6 class="mb-0"><a href="online_gift_shop.php" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Back to Gift Soft</a></h6>
                    </div>

                    </div>
                </div>
                
                <div class="col-lg-4 bg-grey">
                    <div class="p-5">
            
                    <?php
                        if(isset($_SESSION['users'])){
                    ?>
                    <a href="logout_users.php">
                        <button type="button" class="btn btn-danger btn-block btn-lg"
                            data-mdb-ripple-color="dark" style="margin-top: 20px;" >
                            Logout
                        </button>
                    </a>
                    <?php
                        }else{
                    ?>
                    <a href="login.php">
                        <button type="button" class="btn btn-primary btn-block btn-lg"
                            data-mdb-ripple-color="dark">
                            Login
                        </button>
                    </a>
                    <a href="register.php">
                        <button type="button" class="btn btn-warning btn-block btn-lg"
                            data-mdb-ripple-color="dark" style="margin-top: 20px;">
                            Register
                        </button>
                    </a>
                    <?php
                        }
                    ?>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <?php include('../html/footer.html') ?> 
</body>
</html>