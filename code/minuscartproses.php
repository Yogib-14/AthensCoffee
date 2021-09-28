<?php
	include('connection.php');

	$id = $_GET['cart_id'];

	$sql="UPDATE tabel_cart SET quantity=quantity-1 WHERE cart_id='$id'";
	$connection->query($sql);

    $sql2="SELECT * FROM tabel_cart WHERE cart_id='$id'";
	$result=$connection->query($sql2);
    $row=$result->fetch_array();
    if($row['quantity']<1){
        $sql="DELETE FROM tabel_cart WHERE cart_id='$id'";
        $connection->query($sql);
    }  
    

	header('location:products.php');
?>