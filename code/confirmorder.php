<?php
include('connection.php');

if(!isset($_SESSION))
{ 
  session_start();
} 

$order_id = $_GET['order_id'];

$sql = "UPDATE tabel_order SET order_status='done' WHERE order_id = $order_id";
$connection->query($sql);

header('Location: orderhistory.php');

?>