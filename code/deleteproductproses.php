<?php
	include('connection.php');

	$id = $_GET['product'];

	$sql="DELETE FROM tabel_product WHERE product_id='$id'";
	$connection->query($sql);

	header('location:maintenance.php');
?>