<?php
include('connection.php');

if(!isset($_SESSION))
{ 
  session_start();
} 

$product_id = $_GET['product_id'];
$user_id = $_SESSION['user_id'];
$roast = $_POST['roast'];
$grind = $_POST['grind'];
$quantity = $_POST['quantity'];

$sqlroast = "SELECT roast_id FROM tabel_roast WHERE tabel_roast.roast_type = '$roast'";
$result=$connection->query($sqlroast);
if($row=mysqli_fetch_assoc($result)){
  $roast_id = $row['roast_id'];
}
$sqlgrind = "SELECT grind_id FROM tabel_grind WHERE tabel_grind.grind_type = '$grind'";
$result=$connection->query($sqlgrind);
if($row=mysqli_fetch_assoc($result)){
  $grind_id = $row['grind_id'];
}

$sqlcheck = "SELECT * FROM tabel_cart WHERE tabel_cart.user_id = '$user_id' AND tabel_cart.product_id = '$product_id' AND tabel_cart.roast_id = '$roast_id' AND tabel_cart.grind_id = '$grind_id'";
$result=$connection->query($sqlcheck);
if($row=mysqli_fetch_assoc($result)){
    $quantityold = $row['quantity'];
    $quantitynew = $quantityold + $quantity;
    $sqlupdate = "UPDATE tabel_cart SET quantity = $quantitynew WHERE user_id = '$user_id' AND product_id = '$product_id' AND roast_id = '$roast_id' AND grind_id = '$grind_id'";
    $connection->query($sqlupdate);
}else{
    $sql = "INSERT INTO tabel_cart (user_id, product_id, grind_id, roast_id, quantity) VALUES ('$user_id', '$product_id', '$grind_id', '$roast_id', '$quantity')";
    $connection->query($sql);
}



header('Location: products.php');

?>