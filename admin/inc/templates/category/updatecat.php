<div class="card">
    <div class="card-body">
        <div class="d-md-flex align-items-center">
            <h4 class="card-title">Update Category</h4>
        </div>
        <form class="form-horizontal form-material" action="" method="post" role="form">
            <?php if (isset($_SESSION['u_msg'])){ ?>
                <div class="alert alert-success" role="alert"> <?= $_SESSION['u_msg'] ?> </div>
            <?php } ?>
            <script>setTimeout(function () {<?php unset($_SESSION['u_msg']); ?>}, 1000)</script>
            <?php
            $id = $_GET['updateCat'];
            $query = /** @lang text */"SELECT * FROM category WHERE id = '$id' LIMIT 1";
            $result= select_query($query);
            while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="form-group">
                <label class="col-md-12">Category Description</label>
                <div class="col-md-12">
                    <input name="catName" type="text" placeholder="" class="form-control form-control-line" value="<?= $row['catName'] ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Category Description</label>
                <div class="col-md-12">
                    <textarea name="catDescription" class="form-control form-control-line" rows="2" required><?= $row['catDescription'] ?></textarea>
                </div>
            </div>
            <?php } ?>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" name="updateCat" class="btn btn-cyan text-white" id="createCat">
                        <i class="mdi mdi-table-edit createCatLoader"></i>
                        Update Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>