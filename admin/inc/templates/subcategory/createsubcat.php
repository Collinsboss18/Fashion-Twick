<div class="card">
    <div class="card-body">
        <div class="d-md-flex align-items-center">
            <h4 class="card-title">Create Sub-Category</h4>
        </div>
        <form class="form-horizontal form-material" action="" method="post" role="form">
            <div class="form-group">
                <label class="col-md-12">Choose Category</label>
                <div class="col-md-12">
                    <select name="categoryId" class="form-control form-control-line" required>
                        <option>Choose Category</option>
                        <?php $query = /** @lang text */"SELECT * FROM `category`";
                        $result = select_query($query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?= $row['id'] ?>"><?= $row['catName'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Sub-Category</label>
                <div class="col-md-12">
                    <input name="subName" type="text" placeholder="e.g Trouser" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" name="createSub" class="btn btn-cyan text-white" id="createCat">
                        <i class="mdi mdi-table-edit createCatLoader"></i>
                        Create Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>