<?php
	include('connection.php');

    $user_id = $_GET['user_id'];
	$product_id = $_GET['product_id'];

	$sql="INSERT INTO tabel_cart(user_id, product_id, quantity) VALUES ($user_id, $product_id, 1)";
	$connection->query($sql);

	header('location:products.php');
?>