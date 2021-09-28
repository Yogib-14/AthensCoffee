<?php
	include('connection.php');
	$id = $_GET['cart_id'];
	$sql="DELETE FROM tabel_cart WHERE cart_id='$id'";
	$connection->query($sql);
	header('location:cart.php');
?>