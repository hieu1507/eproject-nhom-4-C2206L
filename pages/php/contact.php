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
<body>
<?php include('../html/header.html') ?> 
    <div class="banner0">
        <div class="title">
            <h1 style="color: white; font-weight: bold;">Contact Us</h1>
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
    <?php include('../html/footer.html') ?> 
</body>
</html>