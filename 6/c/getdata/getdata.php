<?php
	require_once '../config/connection.php';

	if ($_GET['act']=="get_all") {
		$query = mysqli_query($con, "SELECT C.id, A.name cashier, C.name product, B.name category, C.price FROM cashier A, category B, product C
			WHERE A.id = C.id_cashier
			AND B.id = C.id_category
			AND CONCAT_WS('', A.name, B.name,C.name) LIKE '%".$_GET['cari']."%'") or die(mysqli_error($con));
		while($row = mysqli_fetch_assoc($query)){
			$data['data'][]=$row;
		}

		echo json_encode($data);
	}elseif ($_GET['act']=="get_by_id") {
		$query = mysqli_query($con, "SELECT id, name, price, id_category, id_cashier FROM product WHERE id='".$_GET['id']."'") or die(mysqli_error($con));
		while($row = mysqli_fetch_assoc($query)){
			$data['data'][]=$row;
		}

		echo json_encode($data);
	}
?>
