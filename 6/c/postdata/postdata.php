<?php
require_once '../config/connection.php';

if ($_POST['act']=="add_data") {

	$execute = mysqli_query($con, "INSERT INTO product(name, price, id_category, id_cashier) VALUES(
			'".$_POST['product']."',
			'".$_POST['price']."',
			'".$_POST['category']."',
			'".$_POST['chasier']."'
			)");

	if ($execute) {
		$output = array("status" => "success");
		echo json_encode($output);
	}else{
		$output = array("status" => "error", "message"=>mysqli_error($con));
		echo json_encode($output);
	}
}elseif ($_POST['act']=="edit_data") {
	$execute = mysqli_query($con, "UPDATE product SET name='".$_POST['product']."', price='".$_POST['price']."', id_category='".$_POST['category']."', id_cashier='".$_POST['chasier']."' WHERE id='".$_POST['id']."' ");

	if ($execute) {
		$output = array("status" => "success");
		echo json_encode($output);
	}else{
		$output = array("status" => "error", "message"=>mysqli_error($con));
		echo json_encode($output);
	}
}elseif ($_POST['act']=="delete_data") {
	$execute = mysqli_query($con, "DELETE FROM product WHERE id='".$_POST['id']."' ");

	if ($execute) {
		$output = array("status" => "success");
		echo json_encode($output);
	}else{
		$output = array("status" => "error", "message"=>mysqli_error($con));
		echo json_encode($output);
	}
}
?>