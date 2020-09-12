<div class="card-body">
    <div class="d-md-flex align-items-center">
        <div>
            <h4 class="card-title">Create Product <span class="badge badge-cyan">More Info</span></h4>
        </div>
        <div class="ml-auto">
            <div class="dl">
                <a href="?"><i style="font-size: 2em;" class="mdi mdi-minus-box text-cyan"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form class="form-horizontal form-material" name="insertProductInfo" action="" method="post" enctype="multipart/form-data">
            <label class="col-md-12">Select Images</label>
            <div class="form-group">
                <div class="col-md-12">
                    <input name="image1" type="file" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input name="image2" type="file" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input name="image3" type="file" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input name="image4" type="file" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button name="insertImage" class="btn btn-cyan text-white">Create Product</button>
                </div>
            </div>
        </form>
    </div>
</div>