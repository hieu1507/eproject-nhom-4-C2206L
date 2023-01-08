<?php
$name = $email = $address = $comment = "";
    if(!empty($_POST)){
        require_once ('../../admin/dbhelper.php');

        $time_create = date("d-m-Y");
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO contact (id_contact, time_create, email, name, address, comment) 
        values('','$time_create','$email','$name', '$address','$comment')";
        query($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/contact.css">
    <!-- Custom fonts for this template-->
    <link href="../../admin/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../admin/assets/css/style.css" rel="stylesheet">
    <title>Contact</title>
</head>
<header>
    <div class="my_container">
        <div class="header">
            <div class="banner">
                <div class="header_tab">
                    <div class="logo">
                        <img src="../../assets/img/jenkinsons-logo.png" alt="">
                    </div>
                    <div class="menu">
                        <ul>
                            <li class="tab"><a class="link" href="../../index.php">BOARDWALK</a></li>
                            <li class="tab2">&#x2022</li>
                            <li class="tab">AQUARIUM</li>
                        </ul>
                    </div>
                </div>
                <div class="logo_light">
                    <img src="../../assets/img/emusement-logo-light.png" alt="">
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
                    <img class="anh" src="../../assets/img/jenks-generic-logo-01-1.png" alt="">
                </div>
                <div class="tab">
                    <ul>
                        <div class="dropdown">
                            <li class="tab1">EXPLORE</li>
                            <div class="dropdown-content">
                                <a href="../../page/html/lookout.html">ADVENTURE LOOKOUT</a>
                                <a href="../../page/html/park.html">AMUSEMENT PARK</a>
                                <a href="../../page/html/#">AQUARIUM</a>
                                <a href="../../page/html/arcades.html">ARCADES</a>
                                <a href="../../page/html/funandgame.html">FUN & GAME</a>
                                <a href="../../page/html/giftshop.html">GIFT SHOPS</a>
                                <a href="../../page/html/history.html">HISTORY</a>
                                <a href="../../page/html/golf.html">MINI GOLF</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <li class="tab1">EVENT</li>
                            <div class="dropdown-content">
                                <a href="../../page/html/special event.html">SPECIAL EVENTS</a>
                                <a href="../../page/html/#">RIDE SCHEDULE</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <li class="tab1">GROUP & PARTIES</li>
                            <div class="dropdown-content">
                                <a href="../../page/html/#">AQUARIUM</a>
                                <a href="../../page/html/#">GROUP SALES</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <li class="tab1">PLAN YOUR VISIT</li>
                            <div class="dropdown-content">
                                <a href="../../page/html/#">BOARDWALK MAP</a>
                                <a href="../../page/html/#">GET REWARDS</a>
                                <a href="../../page/html/#">PLACES TO STAY</a>
                                <a href="../../page/php/contact.php">CONTACT US</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <li class="tab1">SHOP</li>
                            <div class="dropdown-content">
                                <a href="../../page/html/#">GIFT CARDS</a>
                                <a href="../../page/php/#">ADOPT AN ANIMAL</a>
                                <a href="../../page/php/#">ONLINE GIFT SHOPS</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>  
</header>
<body>
    <div class="banner0">
        <div class="title">
            <h1 style="color: white;">Contact Us</h1>
        </div>
    </div>
    <div class="container">
        <form method="post">
            <div class="form">
                <label for="contact-name">Name *</label><br>
                <input required="true" type="text" class="form-control" name="name" value="" placeholder="Please add your name">
            </div>
            <div class="form">
                <label for="contact-email">Email *</label><br>
                <input required="true" type="email" class="form-control" name="email" value="" placeholder="Please add your email">
            </div>
            <div class="form">
                <label for="contact-email">Address *</label><br>
                <input required="true" type="text" class="form-control" name="address" value="" placeholder="Please add your address">
            </div>
            <div class="form">
                <label for="contact-comment">Comment *</label><br>
                <textarea required style="resize: none; font-size: 1rem; outline-color: gray;" name="comment" id="" cols="122" rows="8;" placeholder="Please add any comments or details for your contact submission."></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block" style="margin-bottom: 20px;">Comment</button>
        </form>
    </div>
</body>
<footer>
    <div class="back_ground">
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
                    <img src="../../assets/img/jenkinsons-boardwalk-logo-w.png" alt="">
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
                        <img src="../../assets/img/emusement-rechargable-card-logo.png" alt="">
                    </div>
                    <div class="card_check">
                        <input type="text" name="card">
                        <button>Check Balance</button>
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
                        <a href="">Jenkinson's Boardwalk</a>
                        powered by
                        <a href="">AlphaWeb</a>
                    </span>
                </li>
                <li>|</li>
                <li>
                    <span>
                        <a href="">Privacy Policy</a>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</footer>
</html>