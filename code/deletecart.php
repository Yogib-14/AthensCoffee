<div class="modal fade" id="deletecart<?php echo $row['cart_id']; ?>">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-center" id="myModalLabel">Delete Cart</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h5 class="text-center"><?php echo "Nama Produk: "; echo $row['product_name']; ?></h5>
                <h5 class="text-center"><?php echo "Tipe Roast: "; echo $row['roast_type']; ?></h5>
                <h5 class="text-center"><?php echo "Tipe Grind: "; echo $row['grind_type']; ?></h5>
                <h5 class="text-center"><?php echo "Quantity: "; echo $row['quantity']; ?></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fa fa-remove"></span> Close</button>
                <a href="deletecartproses.php?cart_id=<?php echo $row['cart_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Yes</a>
                </form>
            </div>
        </div>
    </div>
</div>