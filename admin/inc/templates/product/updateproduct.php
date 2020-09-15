<div class="card-body">
    <div class="d-md-flex align-items-center">
        <div>
            <h4 class="card-title">Update Product</h4>
        </div>
        <div class="ml-auto">
            <div class="dl">
                <a href="?"><i style="font-size: 2em;" class="mdi mdi-minus-box text-cyan"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form class="form-horizontal form-material" name="insertProduct" action="" method="post">
            <?php
            $id = $_GET['i'];
            $result =  mysqli_query($con, /** @lang text */"SELECT products.*,category.catName,category.id as cid,subcategory.subcategory,subcategory.id as subId from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$id'");
            while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="form-group">
                <label class="col-sm-12">Select Country</label>
                <div class="col-sm-12">
                    <select name="categoryId" class="form-control form-control-line" onChange="getSubCat(this.value);">
                        <option value="<?= htmlentities($row['cid']);?>"><?= htmlentities($row['catName']);?></option>
                        <?php
                        $id = $_GET['updateCat'];
                        $getCat= mysqli_query($con,/** @lang text */"SELECT * FROM category WHERE `isActive`=1");
                        while ($rw = mysqli_fetch_assoc($getCat)){
                        if($row['catName']==$rw['catName']) {
                            continue;
                        } else {
                            ?>
                            <option value="<?= $rw['id'] ?>"><?= $rw['catName'] ?></option>
                        <?php } } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-12">Select Country</label>
                <div class="col-sm-12">
                    <select name="subcategoryId" id="subcategory" class="form-control form-control-line" required>
                        <option value="<?= htmlentities($row['subId']) ?>"><?= htmlentities($row['subcategory']) ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Product Name</label>
                <div class="col-md-12">
                    <input value="<?= htmlentities($row['productName']) ?>" name="productName" type="text" placeholder="Product Name" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Company</label>
                <div class="col-md-12">
                    <input value="<?= htmlentities($row['company']) ?>" name="company" type="text" placeholder="Company" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Available Product</label>
                <div class="col-md-12">
                    <input value="<?= htmlentities($row['availability']) ?>" name="available" type="number" placeholder="50" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Price in <span>&#8358</span></label>
                <div class="col-md-12">
                    <input value="<?= htmlentities($row['price']) ?>" name="price" type="number" placeholder="100" step="10" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Price Before Discount</label>
                <div class="col-md-12">
                    <input value="<?= htmlentities($row['priceBeforeDiscount']) ?>" name="beforeDiscount" type="number" placeholder="50" step="10" class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Shipping Charge</label>
                <div class="col-md-12">
                    <input value="<?= htmlentities($row['shippingCharge']) ?>" name="shippingCharge" type="number" placeholder="500" step="10" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Description</label>
                <div class="col-md-12">
                    <textarea class="ckeditor" name="description"><?= htmlentities($row['description']) ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button name="updateProduct" class="btn btn-cyan text-white">Update <i class="mdi mdi-arrow-right"></i></button>
                </div>
            </div>
            <?php } ?>
        </form>
    </div>
</div>