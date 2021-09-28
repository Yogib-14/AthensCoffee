<?php
	include('connection.php');

	$id = $_GET['cart_id'];

	$sql="UPDATE tabel_cart SET quantity=quantity+1 WHERE cart_id='$id'";
	$connection->query($sql);

	header('location:products.php');
?>