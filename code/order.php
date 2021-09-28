<?php include('header.php');?>
<!DOCTYPE html>
<html>
<!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
<head>
	<style>
		<?php include "assets/css/orderstyle.css" ?>
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
            <h1 class="page-header text-center" style="color: #fff;">Your Order</h1>
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
					<form action="uploadpayment.php" method="post" enctype="multipart/form-data">
					<?php
					$sql2="SELECT * FROM tabel_cart JOIN tabel_product ON tabel_cart.product_id=tabel_product.product_id JOIN tabel_grind ON tabel_cart.grind_id = tabel_grind.grind_id JOIN tabel_roast ON tabel_cart.roast_id = tabel_roast.roast_id WHERE user_id = $user_id ORDER BY tabel_product.product_name ASC";
					$query2=$connection->query($sql2);
					if($row=mysqli_fetch_assoc($query2)){
					?>
					<div style="background-color: white; padding:30px;">
					<table>
					
					<?php
					$sql3="SELECT * FROM tabel_payment_method ORDER BY tabel_payment_method.method_id ASC";
					$query3=$connection->query($sql3);
					while($row=$query3->fetch_array()){
						?>
						<tbody>
						<div>
							<th>
								<div>
									<div>
										<label style="display: block;"><input type="radio" onclick="display('<?php echo 'metode'; echo $row['method_id']; ?>', '<?php echo $row['payment_method']; ?>', '<?php echo $row['account_number']; ?>')" id="<?php echo 'metode'; echo $row['method_id']; ?>" name="metodepembayaran" value="<?php echo $row['method_id'];?>"><?php echo " "; echo $row['payment_method']; ?></label>
									</div>
								</div>
							</th>
						</div>
						</tbody>
						

						<?php
					}
					?>

					<td class="methoddetail" >
						<div id="ShowHide" style="display:none;">
							<div>
								
									<h5 class="control-label" style="color: black;">Nomor Rekening: </h5>
									<h6 class="control-label" id="norek" style="color: black;"></h6>
									<h5 class="control-label" style="color: black;">Upload Bukti Pembayaran:</h5>
									<input type="file" name="fileToUpload" id="fileToUpload">
									<button name="submit" class="btn btn-primary btn-sm" style="margin-top:10px;">Order</button>
								
							</div>
						</div>
					</td>

				
					
					
					</table>
					</div>
					</form>


					<script>
					function display($id, $name, $norek){
						if(document.getElementById($id).checked){
							document.getElementById("norek").innerHTML = $norek;
							document.getElementById("ShowHide").style.display = "block";
						}
					}
					</script>			
					
                    
					<?php
					}else{
						?>
						<h5>Cart is empty</h5>
						<button onclick="window.location.href='products.php'">View Our Products</button>
						<?php
					}
					?>
				</div>
                <!-- onclick="window.location.href='processorder.php'" -->
			</div>
			<div>
			</div>
        </div>
    </body>

</div>
<script>

    // document.getElementById("fileToUpload").onchange = function() {
    // document.getElementById("form").submit();
    // };


</script>
</html>