<?php
require_once ('../dbhelper.php');

if(isset($_GET['id_mn_product'])) {
	$id_mn_product = $_GET['id_mn_product'];

	//B1. Mo ket noi toi CSDL
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
	mysqli_set_charset($conn, 'utf8');

	//B2. Them/sua/xoa/lay du lieu tu database -> insert/update/delete/select
	$sql = "delete from mn_product where id_mn_product = $id_mn_product";
	mysqli_query($conn, $sql);

	//B3. Dong ket noi toi CSDL
	mysqli_close($conn);
}

header('Location: list_mn_product.php');
?>