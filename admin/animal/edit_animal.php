<?php
session_start();

if(!isset($_SESSION['admin'])) {
	header('Location: ../');
	die();
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin Page</title>

    <!-- Custom fonts for this template -->
    <link
      href="../assets/vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
  
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link
      href="../assets/vendor/datatables/dataTables.bootstrap4.min.css"
      rel="stylesheet"
    />
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include '../components/sidebar.php'; ?>
        <?php include '../components/wrapper.php'; ?>
        <?php
        require_once('../dbhelper.php');

        $sql = "select * from animal where id_animal = '$_GET[id_animal]' LIMIT 1";
        $item = queryResult($sql, true);

        ?>
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Animal</h6>
              </div>
              <div class="card-body">
                <div class="form-responsive">
                <form action="pr_edit_animal.php" method="POST" enctype="multipart/form-data">
                     <div class="mb-3">
                        <label >ID Animal</label>
                        <input readonly name="id_animal" type="text" class="form-control" value="<?=$item['id_animal']?>">
                     </div>
                     <div class="mb-3">
                      <label >Cartegory</label>
                        <select name="cartegory" id="cartegory">
                        <?php
                          require_once('../dbhelper.php');
                          $sql_mn = "SELECT * FROM mn_animal ORDER BY id_mn_animal DESC";
                          $list_mn = queryResult($sql_mn);
                          $index = 0;
                          foreach ($list_mn as $item_mn) {
                          if ($item_mn['id_mn_animal'] == $item['id_mn_animal']) {
                            ?>
                          <option selected value="<?php echo $item_mn['id_mn_animal']; ?>"><?php echo $item_mn['name_mn']; ?></option>
                        <?php }else{ ?>
                          <option value="<?php echo $item_mn['id_mn_animal']; ?>"><?php echo $item_mn['name_mn']; ?></option>
                        <?php }?>
                        <?php }?>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label >Name</label>
                        <input required name="name" type="text" class="form-control" placeholder="Enter Name" value="<?=$item['name']?>">
                      </div>
                     <div class="mb-3">
                      <label >Service</label>
                        <select name="service" id="service">
                          <option value="1"<?php if($item['service'] == '1') { ?> selected="selected"<?php } ?>>Buy</option>
                          <option value="2"<?php if($item['service'] == '2') { ?> selected="selected"<?php } ?>>Rent</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label >Quantity</label>
                        <input required name="quantity" type="text" class="form-control" placeholder="Enter Quantity" value="<?=$item['quantity']?>">
                      </div>
                      <div class="mb-3">
                        <label >Price</label>
                        <input required name="price" type="text" class="form-control" placeholder="Enter Price" value="<?=$item['price']?>">
                      </div>
                      <div class="mb-3">
                        <p><label >Description</label></p>
                        <textarea required name="description" id="" cols="100" rows="4" ><?=$item['description']?></textarea>
                      </div>
                      <div class="mb-3">
                      <label >Status</label>
                        <select name="status" id="status">
                          <option value="1"<?php if($item['status'] == '1') { ?> selected="selected"<?php } ?>>Activated</option>
                          <option value="2"<?php if($item['status'] == '2') { ?> selected="selected"<?php } ?>>Hide</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Avatar</label>
                        <img src="<?=$item['avatar']?>" width="120px" height="120px">
                        <input type="hidden" name="old_fileToUpload" value="<?=$item['avatar']?>">
                        <input name="fileToUpload" class="form-control" type="file" id="formFile" style="margin-top: 10px;">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <?php include '../components/footer.php'; ?>
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <?php include '../components/logout_modal.php'; ?>
    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
  </body>
</html>
