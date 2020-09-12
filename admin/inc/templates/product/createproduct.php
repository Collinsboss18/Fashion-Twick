<div class="card-body">
    <div class="d-md-flex align-items-center">
        <div>
            <h4 class="card-title">Create Product</h4>
        </div>
        <div class="ml-auto">
            <div class="dl">
                <a href="?"><i style="font-size: 2em;" class="mdi mdi-minus-box text-cyan"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form class="form-horizontal form-material" name="insertProduct" action="" method="post">
            <div class="form-group">
                <label class="col-sm-12">Select Country</label>
                <div class="col-sm-12">
                    <select name="categoryId" class="form-control form-control-line" onChange="getSubCat(this.value);">
                        <option>Select Category</option>
                        <?php
                        $id = $_GET['updateCat'];
                        $query = /** @lang text */"SELECT * FROM category";
                        $result= select_query($query);
                        while ($row = mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?= $row['id'] ?>"><?= $row['catName'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-12">Select Country</label>
                <div class="col-sm-12">
                    <select name="subcategoryId" id="subcategory" class="form-control form-control-line" required>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Product Name</label>
                <div class="col-md-12">
                    <input name="productName" type="text" placeholder="Product Name" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Company</label>
                <div class="col-md-12">
                    <input name="company" type="text" placeholder="Company" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Available Product</label>
                <div class="col-md-12">
                    <input name="available" type="number" placeholder="50" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Price in <span>&#8358</span></label>
                <div class="col-md-12">
                    <input name="price" type="number" placeholder="100" step="10" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Price Before Discount</label>
                <div class="col-md-12">
                    <input name="beforeDiscount" type="number" placeholder="50" step="10" class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Shipping Charge</label>
                <div class="col-md-12">
                    <input name="shippingCharge" type="number" placeholder="500" step="10" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Description</label>
                <div class="col-md-12">
                    <textarea name="description" class="ckeditor"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button name="createProduct" class="btn btn-cyan text-white">Next <i class="mdi mdi-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>