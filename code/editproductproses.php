<?php
    include('connection.php');

    $id=$_GET['produk'];

    $namap=$_POST['namaproduk'];
    $deskripsi=$_POST['desc'];
    $harga=$_POST['harga'];

    $sql="SELECT * FROM tabel_product WHERE product_id='$id'";
    $query=$connection->query($sql);
    $row=$query->fetch_array();

    $fileinfo=PATHINFO($_FILES["foto"]["name"]);

    if (empty($fileinfo['filename'])){
        $tujuan = $row['image'];
    }
    else{
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["foto"]["tmp_name"],"assets/img/" . $newFilename);
        $tujuan="assets/img/" . $newFilename;
    }

    $sql="UPDATE tabel_product SET product_name='$namap', product_description='$deskripsi', product_price='$harga', product_image='$tujuan' WHERE product_id='$id'";
    $connection->query($sql);

    header('location:maintenance.php');
?>