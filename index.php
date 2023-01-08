<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chu</title>
    <link rel="stylesheet" href="pages/css boardwalk/trangchu.css">
    <link rel="stylesheet" href="pages/html/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="themify-icons/fontawesome/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <script src="trangchu.js"></script>
</head>

<body>
    <div class="my_container">
        <div class="header">
            <div class="banner">
                <div class="header_tab">
                    <div class="logo">
                        <img src="pages/anh/jenkinsons-logo.png" alt="">
                    </div>
                    <div class="menu">
                        <ul>
                            <li class="tab"><a class="link" href="index.php">BOARDWALK</a></li>
                            <li class="tab2">&#x2022</li>
                            <li class="tab">AQUARIUM</li>
                        </ul>
                    </div>
                </div>
                <div class="logo_light">
                    <img src="pages/anh/emusement-logo-light.png" alt="">
                </div>
            </div>
            <div class="search">
                <div class="icon_contact">
                    <div class="icon_MXH">
                        <i class="fa-brands fa-square-facebook"></i>
                    </div>
                    <div class="icon_MXH">
                        <i class="fa-brands fa-twitter"></i>
                    </div>
                    <div class="icon_MXH">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="icon_MXH">
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                    <div class="icon_MXH">
                        <i class="fa-brands fa-snapchat"></i>
                    </div>
                </div>
                <div class="search1">
                    <input type="text" name="s" autocomplete="off">
                    <div class="icon1">
                        <span class="ti-search"></span>
                    </div>
                </div>
            </div>
            <div class="menu_tab">
                <div class="logo_Aquarium">
                    <img class="anh" src="pages/anh/jenks-generic-logo-01-1.png" alt="">
                </div>
                <div class="tab">
                    <ul>
                        <div class="dropdown">
                            <li class="tab1">EXPLORE</li>
                            <div class="dropdown-content">
                                <a href="pages/html/lookout.html">ADVENTURE LOOKOUT</a>
                                <a href="pages/html/park.html">AMUSEMENT PARK</a>
                                <a href="pages/html/arcades.html">ARCADES</a>
                                <a href="pages/html/funandgame.html">FUN & GAME</a>
                                <a href="pages/html/giftshop.html">GIFT SHOPS</a>
                                <a href="pages/html/history.html">HISTORY</a>
                                <a href="pages/html/golf.html">MINI GOLF</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <li class="tab1">EVENT</li>
                            <div class="dropdown-content">
                                <a href="pages/html/special event.html">SPECIAL EVENTS</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <li class="tab1">GROUP & PARTIES</li>
                            <div class="dropdown-content">
                                <a href="pages/html/ourmission.html">AQUARIUM</a>
                                <a href="pages/php/online_gift_shop.php">GROUP SALES</a> 
                            </div>
                        </div>
                        <div class="dropdown">
                            <li class="tab1">PLAN YOUR VISIT</li>
                            <div class="dropdown-content">
                                <a href="pages/html/lookout.html">PLACES TO STAY</a>
                                <a href="pages/php/contact.php">CONTACT US</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <li class="tab1">SHOP</li>
                            <div class="dropdown-content">
                                <a href="pages/html/giftshop.html">GIFT CARDS</a>
                                <a href="pages/php/adopt_animal.php">ADOPT AN ANIMAL</a>
                                <a href="pages/php/online_gift_shop.php">ONLINE GIFT SHOPS</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="add">
                <div class="video_add">
                    <video autoplay="" loop="" muted="" playsinline="" poster="">
                        <source class="video"
                            src="https://jenkinsons.com/wp-content/uploads/2022/07/Jenkinsons-Boardwalk-Commercial-2022-No-Sound.mp4"
                            type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
        <div class="event">
            <?php
                require_once('admin/dbhelper.php');

                $sql = "select * from events where status = 1 ";
                $list = queryResult($sql);
                $index = 0;
            ?>
            <div class="event_titleA">
                <h2>Upcoming Events</h2>
            </div>
            <section style="background-color: #eee;">
                <div class="container py-5">
                    <div class="row">
                    <?php
                    if ($sql) {
                        foreach ($list as $item) { ?>
                    <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                        <div class="card">
                        <img src="admin/uploads/<?= $item['ev_avatar'] ?>"
                            class="card-img-top" style="height: 20rem; width: 100%;"/>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0"><?= $item['ev_title'] ?></h5>
                            </div>
                            <div class="d-flex justify-content-between">
                            <p class="big">Time Start</p>
                            <p class="big"><?= $item['ev_start'] ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                            <p class="big">Time End</p>
                            <p class="big"><?= $item['ev_end'] ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                            <h5 class="mb-0">Description</h5>
                            </div> 
                            <div class="d-flex justify-content-between">
                            <p class="big"><?= $item['ev_description'] ?></p>
                            </div>   
                        </div>
                        </div>
                    </div>
                    <?php }
                    }else{
                        echo "No data now!";
                    } ?>
                    </div>
                </div>
            </section>
            <div class="view_event">
                <button class="event_view">View Event All</button>
            </div>
        </div>
        <div class="slide">
            <div class="slide_show">
                <div id="carouselExampleSlidesOnly" class="carousel slide img_sl" data-ride="carousel">
                    <div class="carousel-inner sl">
                        <div class="carousel-item active img_slideshow">
                            <div class="introduce">
                                <h2 class="text_description">Ride</h2>
                                <P class="text_introduce">From small rides great for child’s first amusement park
                                    experience, to the big rides that
                                    teenagers and kids at heart alike will be thrilled by, Jenkinson’s has it all.</P>
                            </div>
                            <img class="d-block w-100 img_slide" style="max-height:600px" src="pages/anh/item-a.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item img_slideshow">
                            <div class="introduce">
                                <h2 class="text_description">Play</h2>
                                <p class="text_introduce">Jenkinson’s Boardwalk offers your family a wide range of
                                    activities whether you are
                                    visiting for the day or the entire summer, you will always find something to excite
                                    every member of your family.</p>
                            </div>
                            <img class="d-block w-100 img_slide" style="max-height:600px" src="pages/anh/IMG_3244.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item img_slideshow">
                            <div class="introduce">
                                <h2 class="text_description">Relax</h2>
                                <p class="text_introduce">Whether it be lounging on the beach, or taking a nice walk on
                                    the
                                    boardwalk, spend your
                                    day relaxing with us!</p>
                            </div>
                            <img class="d-block w-100 img_slide" style="max-height:600px" src="pages/anh/jenkinsons-beach-aerial.png"
                                alt="Third slide">
                        </div>
                        <div class="carousel-item img_slideshow">
                            <div class="introduce">
                                <h2 class="text_description">Eat</h2>
                                <p class="text_introduce">From classic and traditional boardwalk foods like pizza,
                                    funnel
                                    cakes, fries, and beyond
                                    to amazing sit down ocean view dining, the food options are plentiful at Jenkinson's
                                    Boardwalk.</p>
                            </div>
                            <img class="d-block w-100 img_slide" src="pages/anh/Hulvat_Jenk-94266.jpg" alt="Third slide">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub">
            <div class="text">
                <h2 class="title_text">ALWAYS SOMETHING HAPPENING</h2>
                <P class="text_sub">Subscribe to our newsletter for upcoming events and <br> special offers jenkinsons,
                    all year
                    long!</P>
                <input class="email" type="email" name="email">
                <button class="buton" for="" style="background-color: rgba(2, 188, 2, 0.829);">Subscribe</button>
            </div>
            <div class="contact">
                <p class="stay">STAY IN TOUCH</p>
                <div class="icon_LH">
                    <i class="fa-brands fa-square-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-youtube"></i>
                    <i class="fa-brands fa-snapchat"></i>
                </div>
            </div>
        </div>
        <div class="logo_end">
            <div class="logo_brand">
                <img class="brand" src="pages/anh/jenks-generic-logo-01-1.png" alt="">
            </div>
            <div class="logo_brand">
                <img class="brand1" src="pages/anh/aquarium-logo.png" alt="">
            </div>
        </div>
        <div class="back_groud">
            <div class="address_location">
                <div class="icon_position">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="location">
                    <p class="position">300 Ocean Avenue, Point Pleasant Beach, NJ 08742 | 732-892-0600</p>
                </div>
            </div>
            <div class="connect">
                <div class="connect_left">
                    <div class="subscribe">
                        <h3 class="title_sub">STAY CONNECTED</h3>
                        <input type="text" name="subs">
                        <button class="button_sub">Subscribe</button>
                    </div>
                    <div class="follow_us">
                        <h3>FOLLOW US</h3>
                        <i class="fa-brands fa-square-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-youtube"></i>
                        <i class="fa-brands fa-snapchat"></i>
                    </div>
                    <div class="logo_boardwalk">
                        <img src="pages/anh/jenkinsons-boardwalk-logo-w.png" alt="">
                    </div>
                </div>
                <div class="connect_right">
                    <div class="menu_contact">
                        <div class="beach">
                            <h3 class="menu_title">BEACH</h3>
                            <h4 class="menu_description">Jenkinson's Beach Cam</h4>
                        </div>
                        <div class="plan">
                            <h3 class="menu_title">PLAN YOUR VISIT</h3>
                            <h4 class="menu_description">Contact Us</h4>
                            <h4 class="menu_description">Jenkinson's BoardWalk Map</h4>
                        </div>
                        <div class="join">
                            <h3 class="menu_title">Join Our Team</h3>
                        </div>
                    </div>
                    <div class="card_gift">
                        <div class="logo_card">
                            <img src="pages/anh/emusement-rechargable-card-logo.png" alt="">
                        </div>
                        <div class="card_check">
                            <input type="text" name="card" placeholder="Card Number">
                            <button style="background-color: green">Check Balance</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="sologan">
                <h4 class="sologan_text">Generating Smiles For</h4>
            </div>
            <div class="copy_right">
                <ul>
                    <li><span>© 2022 |</span></li>
                    <li>
                        <span>
                            <a href="" style="text-decoration: none;">Jenkinson's Boardwalk</a>
                            powered by
                            <a href=""style="text-decoration: none;">AlphaWeb</a>
                        </span>
                    </li>
                    <li>|</li>
                    <li>
                        <span>
                            <a href=""style="text-decoration: none;" >Privacy Policy</a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script>
</html>