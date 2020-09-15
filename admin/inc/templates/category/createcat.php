<div class="card">
    <div class="card-body">
        <div class="d-md-flex align-items-center">
            <h4 class="card-title">Create Category</h4>
        </div>
        <form class="form-horizontal form-material" action="" method="post" role="form">
            <?php if (isset($_SESSION['c_msg'])){ ?>
                <div class="alert alert-success" role="alert"> <?= $_SESSION['c_msg'] ?> </div>
            <?php } ?>
            <script>setTimeout(function () {<?php unset($_SESSION['c_msg']); ?>}, 1000)</script>
            <div class="form-group">
                <label class="col-md-12">Category Description</label>
                <div class="col-md-12">
                    <input name="catName" type="text" placeholder="" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Category Description</label>
                <div class="col-md-12">
                    <textarea name="catDescription" class="form-control form-control-line" rows="2" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" name="createCat" class="btn btn-cyan text-white" id="createCat">
                        <i class="mdi mdi-table-edit createCatLoader"></i>
                        Create Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>