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

        $sql = "select * from product, mn_product 
        where product.id_mn_product = mn_product.id_mn_product";
        $list = queryResult($sql);
        $index = 0;
        ?>
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Product</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Cartegory</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $item) { ?>
                            <tr>
                                <td><?=$item['id_product']?></td>
                                <td><?php echo ucfirst($item['name']);?></td>
                                <td><img src="<?=$item['avatar']?>" alt="" width="100px" height="100px"></td>
                                <td><?=$item['name_mn']?></td>
                                <td><?=$item['quantity']?></td>
                                <td><?=$item['price']?></td>
                                <td><?=$item['description']?></td>
                                <td>
                                    <?php
                                    if ($item['status'] == '1')
                                      echo 'Activated';
                                    else
                                      echo 'Hide';
                                    ?>
                                </td>
                                <td>
                                    <a href="edit_product.php?id_product=<?=$item['id_product']?>" style="margin-right: 5px;"><button class="btn btn-warning">Edit</button></a>
                                    <a onclick="return confirm('Are you sure want to delete?')" href="delete_product.php?id_product=<?=$item['id_product']?>"><button class="btn btn-danger">Remove</button></a>
                                </td>
                            </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <?php include '../components/footer.php'; ?>
        <!-- End of Footer -->
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

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
  </body>
</html>
