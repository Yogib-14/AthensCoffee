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
    <div>
        <h5>Current Order</h5>
        <?php
        $sql="SELECT * FROM tabel_order WHERE user_id = $user_id AND order_status !='done'";
        $query=$connection->query($sql);
        if($row=$query->fetch_array()){
        ?>
        <div style="margin-top:10px;">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                        <th>Created At</th>
                        <th>Order Status</th>
                        <th>Total Price</th>
                        <th>Track</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $sql2="SELECT * FROM tabel_order WHERE user_id = $user_id AND order_status !='done'";
                    $query=$connection->query($sql2);
                    while($row=$query->fetch_array()){
                    ?>
                    <tr class="text-center" style="background-color:#F5F5F5">
                        <td style="vertical-align: middle;"><?php echo $row['created_at']; ?></td>
                        <td style="vertical-align: middle;"><?php echo $row['order_status']; ?></td>
                        <td style="vertical-align: middle;"><?php echo "Rp. "; echo number_format($row['total_price']); ?></td>
                        <td style="vertical-align: middle;"><a href="trackorder.php?order_id=<?php echo $row['order_id'];?>">Click to Track Order</a></td>
                    </tr>
                    <?php
                    }
                    
                    ?>
                    </tbody>
                </table>
        </div>
        <?php
        }else{
            ?>
            <h5>Empty</h5>
            <button onclick="window.location.href='products.php'" class="btn btn-primary btn-sm">Order now!</button>
            <?php
        }
        ?>
    </div>
    <div>
        <h5 style="margin-top: 30px;">Previous Order</h5>
        <?php
        $sql3="SELECT * FROM tabel_order WHERE user_id = $user_id AND order_status ='done'";
        $query=$connection->query($sql3);
        if($row=$query->fetch_array()){
        ?>
        <div style="margin-top:10px;">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                        <th>Created At</th>
                        <th>Total Price</th>
                        <th>View Order Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $sql2="SELECT * FROM tabel_order WHERE user_id = $user_id AND order_status ='done'";
                    $query=$connection->query($sql2);
                    while($row=$query->fetch_array()){
                    ?>
                    <tr class="text-center" style="background-color:#F5F5F5">
                        <td style="vertical-align: middle;"><?php echo $row['created_at']; ?></td>
                        <td style="vertical-align: middle;"><?php echo "Rp. "; echo number_format($row['total_price']); ?></td>
                        <td style="vertical-align: middle;"><a href="vieworderdetails.php?order_id=<?php echo $row['order_id'];?>">Click to View Order Details</a></td>
                    </tr>
                    <?php
                    }
                    
                    ?>
                    </tbody>
                </table>
        </div>
        <?php
        }else{
            ?>
            <h5>Empty</h5>
            <button onclick="window.location.href='products.php'" class="btn btn-primary btn-sm">Order now!</button>
            <?php
        }
        ?>
    </div>
</div>
</body>
</div>
</html>