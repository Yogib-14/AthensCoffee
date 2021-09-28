<!DOCTYPE html>
<html>
<!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
<head>
	<style>
		<?php include "assets/css/maintenancestyle.css" ?>
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<div class="wrap">
	<?php include('header.php');?>
	<div class="content">
		<div class="container">
			<h1 class="page-header text-center" style="color: #fff;">Maintenance</h1>
			<div class="row">
				<div style="margin-top:10px;">
					<a href="#addproduct" data-toggle="modal" class="pull-right btn btn-primary"><span class="fa fa-plus"></span> Product</a>
					<?php include('addproduct.php'); ?>
				</div>
					<table class="table table-striped table-bordered" style="margin-top:10px;">
						<thead class="thead-dark text-center">
							<th>Foto</th>
							<th style="width: 200px;">Nama Produk</th>
							<th>Deskripsi</th>
							<th>Harga</th>
							<th>Tindakan</th>
						</thead>
					<tbody>
						<?php
							$sql="SELECT * FROM tabel_product ORDER BY product_name ASC";
							$query=$connection->query($sql);
							while($row=$query->fetch_array()){
								?>
								<tr class="text-center" style="background-color:#F5F5F5;">
									<td><a href="<?php if(empty($row['product_image'])){echo "assets/img/noimage.jpg";} else{echo $row['product_image'];} ?>"><img src="<?php if(empty($row['product_image'])){echo "assets/img/noimage.jpg";} else{echo $row['product_image'];} ?>" height="100px" width="120px"></a></td>
									<td style="vertical-align: middle;"><?php echo $row['product_name']; ?></td>
									<td style="width: 500px; vertical-align: middle;"><?php echo $row['product_description']; ?></td>
									<td style="width: 150px; vertical-align: middle;"><?php echo "Rp. "; echo number_format($row['product_price']); ?></td>
									<td style="width: 1000px; vertical-align: middle;">
										<a href="#editproduct<?php echo $row['product_id']; ?>" data-toggle="modal" class="btn btn-success btn-sm">Edit</a> ||
										<?php include('editproduct.php');?>
										<a href="#deleteproduct<?php echo $row['product_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Delete</a>
										<?php include('deleteproduct.php');?>
									</td>
								</tr>
								<?php
							}
						?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<body>
	
</body>
</html>