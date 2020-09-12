<div class="card">
    <div class="card-body">
        <div class="d-md-flex align-items-center">
            <h4 class="card-title">Update Sub-Category</h4>
        </div>
        <form class="form-horizontal form-material" action="" method="post" role="form">
            <?php
            $id = $_GET['updatesub'];
            $query = /** @lang text */"SELECT subcategory.id, subcategory.categoryid, category.catName,subcategory.subcategory FROM subcategory JOIN category ON category.id=subcategory.categoryid WHERE subcategory.id ='$id'";
            $result= select_query($query);
            while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="form-group">
                <label class="col-md-12">Choose Category</label>
                <div class="col-md-12">
                    <select name="categoryId" class="form-control form-control-line" required>
                        <option value="<?= $row['categoryId'] ?>"><?= $row['catName'] ?></option>
                        <?php $query = /** @lang text */"SELECT * FROM `category`";
                        $result = select_query($query);
                        while ($cat = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?= $cat['id'] ?>"><?= $cat['catName'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Sub-Category</label>
                <div class="col-md-12">
                    <input name="subName" type="text" placeholder="e.g Trouser" value="<?= $row['subcategory'] ?>" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" name="updateSub" class="btn btn-cyan text-white" id="createCat">
                        <i class="mdi mdi-table-edit createCatLoader"></i>
                        Update Sub-Category
                    </button>
                </div>
            </div>
            <?php } ?>
        </form>
    </div>
</div>