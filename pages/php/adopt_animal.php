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
        .button_shop:hover{
            background-color: #ff8c00;
            color: white;
        }
    </style>
</head>
<body>
   <?php include('../html/header.html') ?> 

    <!-- Hero -->
    <div class="p-5 text-center bg-image rounded-3" style="
        background-image: url('../../assets/img/1616164765610.jpg');
        height: 600px;
    ">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
            <h1 class="mb-3">GIFT SHOP</h1>
            <h4 class="mb-3">Welcome to Jenkinson's Boardwalk Online Gift Shop!</h4>
            <h3 class="mb-3">USE PROMO CODE HOLLY25 TO RECIEVE 
                25% ON ALL APPAREL DURING
                OUR HOLIDAY SALE!</h3>
            <a class="btn btn-outline-light btn-lg button_shop" href="#!" role="button">Shop Now</a>
        </div>
        </div>
    </div>
    </div>
    <!-- Hero -->
    <div class="container py-5 text-center">
        <h2>Featured animals</h2>
    </div>
    <section style="background-color: #eee;">
    <div class="container py-5">
        <?php
        require_once('../../admin/dbhelper.php');

        $sql = "select * from animal, mn_animal 
        where animal.id_mn_animal = mn_animal.id_mn_animal and status = 1 ";
        $list = queryResult($sql);
        $index = 0;
        ?>
        <div class="row">
        <div class="col-md-8 col-lg-6 col-xl-4">
        <?php foreach ($list as $item) { ?>
        <form action="cart_animal/crud_giohang_animal.php?id_animal=<?=$item['id_animal']?>" method="post">
            <div class="card" style="border-radius: 15px; margin-top: 15px;">
            <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
                data-mdb-ripple-color="light">
                <img src="../../admin/uploads/<?=$item['avatar']?>"
                style="border-top-left-radius: 15px; border-top-right-radius: 15px; width: 100%; height: 360px" class="img-fluid"/>
                <a href="#!">
                <div class="mask"></div>
                </a>
            </div>
            <hr class="my-0" />
            <div class="card-body pb-0">
                <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="big text-muted"><?=$item['name_mn']?></p>
                    <p><a href="#!" class="text-dark" style="font-size: large;"><?=$item['name_animal']?></a></p>
                    <p class="big text-muted">
                        Quantity:
                        <?php
                        if($item['quantity_animal'] <= 0){
                            echo 'Sold Out';
                        }else{
                            echo $item['quantity_animal'];
                        }
                        ?>
                    </p>
                </div>
                <div>
                    <p><a href="#!" class="text-dark"  style="font-size: large;"><?php echo '$'.number_format($item['price_animal'], 0,',','.');?></a></p>
                </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                <button type="submit" class="btn btn-primary" name="themgiohang" >Add to Cart</button>
            </div>
            </div>
            </div>
            </form> 
        <?php } ?>
        </div>
        </div>
    </div>
    </section>
    
   <?php include('../html/footer.html') ?> 
</body>
</html>