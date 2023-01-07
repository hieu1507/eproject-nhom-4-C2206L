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

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <?php
                require_once('../dbhelper.php');

                $sql_animal = "SELECT * FROM tbl_cart_details, animal, tbl_cart
                WHERE tbl_cart_details.id_animal = animal.id_animal
                AND tbl_cart_details.code_cart = '$_GET[code_cart]'";
                $list_animal = queryResult($sql_animal);
                $index = 0;
                ?>
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Code Cart</th>
                        <th>Animal Name</th>
                        <th>Quantity Animal</th>
                        <th>Price Animal</th>
                        <th>Total Order Animal</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $total_animal_list = 0;
                        foreach ($list_animal as $item) { ?>
                            <tr>
                                <td><?=$item['id_cart_details']?></td>
                                <td><?=$item['code_cart']?></td>
                                <td><?=$item['name_animal']?></td>
                                <td><?=$item['quantity_animal']?></td>
                                <td><?='$'.number_format($item['price_animal'], 0,',','.')?></td>
                                <td>
                                    <?php
                                    $total_animal = $item['quantity_animal'] * $item['price_animal'];
                                    $total_animal_list += $total_animal;
                                    echo '$'.number_format($total_animal, 0,',','.');
                                    ?>
                                </td>
                            </tr>
                    <?php } ?>               
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11">
                                <p>Total Animal:  
                                    <?php
                                        echo '$'.number_format($total_animal_list, 0,',','.');
                                    ?>
                                </p>
                            </td>
                        </tr>
                    </tfoot>
                  </table>
                  <?php
                require_once('../dbhelper.php');

                $sql_product = "SELECT * FROM tbl_cart_details, product, tbl_cart
                WHERE tbl_cart_details.id_product = product.id_product
                AND tbl_cart_details.code_cart = '$_GET[code_cart]'";
                $list_product = queryResult($sql_product);
                $index = 0;
                ?>
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Code Cart</th>
                        <th>Product Name</th>
                        <th>Quantity Product</th>
                        <th>Price Product</th>
                        <th>Total Order Product</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $total_product_list = 0;
                        foreach ($list_product as $item) { ?>
                            <tr>
                                <td><?=$item['id_cart_details']?></td>
                                <td><?=$item['code_cart']?></td>
                                <td><?=$item['name_product']?></td>
                                <td><?=$item['quantity_product']?></td>
                                <td><?='$'.number_format($item['price_product'], 0,',','.')?></td>
                                <td>
                                    <?php
                                    $total_product = $item['quantity_product'] * $item['price_product'];
                                    $total_product_list += $total_product;
                                    echo '$'.number_format($total_product, 0,',','.');
                                    ?>
                                </td>
                            </tr>
                    <?php } ?>               
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11">
                                <p>Total Product:  
                                    <?php
                                        echo '$'.number_format($total_product_list, 0,',','.');
                                    ?>
                                </p>
                            </td>
                        </tr>
                    </tfoot>
                  </table>
                  <table>
                    <thead>
                      <tr>
                            <td colspan="11" style="font-size: 20px;">
                                <p>Total:  
                                    <?php
                                        echo '$'.number_format(($total_product_list + $total_animal_list), 0,',','.');
                                    ?>
                                </p>
                            </td>
                        </tr>
                    </thead>
                  </table>
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

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
  </body>
</html>



                    