<?php include('header.php');?>
<!DOCTYPE html>
<html>
<!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
<head>
	<style>
		<?php include "assets/css/cartstyle.css" ?>
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<div class="wrap">
    <body>
        <div class="content">
            <h1 class="page-header text-center" style="color: #fff;">Shopping Cart</h1>
			<div class="container">
				<div style="margin-top:50px;">
					<table class="table table-striped table-bordered">
					<thead class="thead-dark text-center">
						<tr>
						<th>Foto</th>
						<th>Nama Produk</th>
						<th>Tipe Roast</th>
						<th>Tipe Grind</th>
						<th>Harga</th>
						<th>Quantity</th>
						<th>Subtotal</th>
						<th>Delete</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$user_id = $_SESSION['user_id'];
					$sql="SELECT * FROM tabel_cart JOIN tabel_product ON tabel_cart.product_id=tabel_product.product_id JOIN tabel_grind ON tabel_cart.grind_id = tabel_grind.grind_id JOIN tabel_roast ON tabel_cart.roast_id = tabel_roast.roast_id WHERE user_id = $user_id ORDER BY tabel_product.product_name ASC";
					$query=$connection->query($sql);
					$totalharga=0;	
					while($row=$query->fetch_array()){
						$subtotal = $row['product_price'] * $row['quantity'];
						$totalharga = $totalharga + $subtotal;
					?>
					<tr class="text-center" style="background-color:#F5F5F5">
						<td style="width: 300px; vertical-align: middle;><a href="<?php if(empty($row['product_image'])){echo "assets/img/noimage.jpg";} else{echo $row['product_image'];} ?>"><img src="<?php if(empty($row['product_image'])){echo "assets/img/noimage.jpg";} else{echo $row['product_image'];} ?>" height="100px" width="110px"></a></td>
						<td style="vertical-align: middle;"><?php echo $row['product_name']; ?></td>
						<td style="width: 500px; vertical-align: middle;"><?php echo $row['roast_type']; ?></td>
						<td style="width: 500px; vertical-align: middle;"><?php echo $row['grind_type']; ?></td>
						<td style="width: 200px; vertical-align: middle;"><?php echo "Rp. "; echo number_format($row['product_price']); ?></td>
						<td style="width: 150px; vertical-align: middle;"><?php echo $row['quantity']; ?></td>
						<td style="width: 200px; vertical-align: middle;"><?php echo "Rp. "; echo number_format($subtotal); ?></td>
						<td style="width: 200px; vertical-align: middle;">
						<a href="#deletecart<?php echo $row['cart_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Delete</a>
						<?php include('deletecart.php');?>
						</td>
					</tr>
					<?php
					}
					
					?>
					</tbody>
					</table>
				</div>
				<div>
					<h5>Total Price:</h5>
					<h6><?php echo "Rp. "; echo number_format($totalharga); ?></h6>
				</div>
				<?php
				$sql2="SELECT * FROM tabel_cart JOIN tabel_product ON tabel_cart.product_id=tabel_product.product_id JOIN tabel_grind ON tabel_cart.grind_id = tabel_grind.grind_id JOIN tabel_roast ON tabel_cart.roast_id = tabel_roast.roast_id WHERE user_id = $user_id ORDER BY tabel_product.product_name ASC";
				$query2=$connection->query($sql2);
				if($row=mysqli_fetch_assoc($query2)){
				?>
				<button class="btn btn-primary btn-sm" onclick="window.location.href='order.php'">Proceed to Order</button>
				<?php
				}else{
					?>
					<h5>Cart is empty</h5>
					<button class="btn btn-primary btn-sm" onclick="window.location.href='products.php'">View Our Products</button>
					<?php
				}
				?>
			</div>
			<div>
			</div>
        </div>
    </body>

</div>
<script>
	function changeqty(){
    var inputqty = document.getElementById("inputqty");
    if(inputqty.value<1){
      inputqty.value = 1;
    }
    
}
</script>
</html>