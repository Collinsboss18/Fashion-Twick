<div class="card-body">
    <div class="d-md-flex align-items-center">
        <div>
            <h4 class="card-title">Manage Products</h4>
        </div>
        <div class="ml-auto">
            <div class="dl">
                <a title="Print Data" href="#" onclick="window.print()" style="font-size: 2em;" class="mdi mdi-printer text-secondary"></i></a>
                <a title="Create Product" href="?action=create"><i style="font-size: 2em;" class="mdi mdi-plus-box text-cyan"></i></a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="datatable-1 table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Sub-Category</th>
                <th scope="col">Price</th>
                <th scope="col">Updated</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php $result = mysqli_query($con,/** @lang text */"SELECT products.*,category.catName,subcategory.subcategory FROM products JOIN category ON category.id=products.category JOIN subcategory ON subcategory.id=products.subCategory ORDER BY products.id DESC");
            $cnt = 1;
            while ($row = mysqli_fetch_assoc($result)){
                if ($row['isActive'] == 1){
                ?>
                <tr>
                    <th scope="row"><?= htmlentities($cnt) ?></th>
                    <td><?= htmlentities($row['productName']) ?></td>
                    <td><?= htmlentities($row['catName']) ?></td>
                    <td><?= htmlentities($row['subcategory']) ?></td>
                    <td><span>&#8358</span><?= htmlentities($row['price']) ?></td>
                    <td><?= htmlentities(date("j-M-y", strtotime($row['updated_at']))) ?></td>
                    <td><a href="?action=update&i=<?= $row['id'] ?>" class="text-cyan"><i class="mdi mdi-table-edit" title="Edit"></i></a></td>
                    <td><a href="?delPro=<?= $row['id'] ?>" class="text-danger"><i class="fa fa-trash" title="Delete" onClick="return confirm('Are you sure you want to delete?')"></i></a></td>
                </tr>
                <?php $cnt=$cnt+1; } } ?>
            </tbody>
        </table>
    </div>
</div>