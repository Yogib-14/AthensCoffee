<?php
include('connection.php');

$namap=$_POST['namaproduk'];
$harga=$_POST['harga'];
$deskripsi=$_POST['desc'];

$fileinfo=PATHINFO($_FILES["foto"]["name"]);

if(empty($fileinfo['filename'])){
	$tujuan="";
}else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["foto"]["tmp_name"],"assets/img/" . $newFilename);
	$tujuan="assets/img/" . $newFilename;
	}
	
$sql="INSERT INTO tabel_product (product_name, product_description, product_price, product_image) VALUES ('$namap', '$deskripsi', '$harga', '$tujuan')";
$connection->query($sql);

header('location:maintenance.php');

?>