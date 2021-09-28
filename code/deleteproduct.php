<div class="modal fade" id="deleteproduct<?php echo $row['product_id']; ?>">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel" style="color:black;">Delete Produk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h3 class="text-center" style="color:black;"><?php echo $row['product_name']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fa fa-remove"></span> Close</button>
                <a href="deleteproductproses.php?product=<?php echo $row['product_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Yes</a>
                </form>
            </div>
        </div>
    </div>
</div>