<div class="col-lg-3 col-md-3">
    <div class="shop__sidebar">
        <div class="sidebar__categories">
            <div class="section-title">
                <h4>Categories</h4>
            </div>
            <div class="categories__accordion">
                <div class="accordion" id="accordionExample">
                    <?php
                    $result= mysqli_query($con, /** @lang text */ "SELECT * FROM category WHERE `isActive`=1");
                    while ($row = mysqli_fetch_assoc($result)){ ?>
                    <div class="card">
                        <div class="card-heading active">
                            <a data-toggle="collapse" data-target="#collapse<?= $row['id'] ?>"><?= $row['catName'] ?></a>
                        </div>
                        <div id="collapse<?= $row['id'] ?>" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <ul>
                                    <a href="shop.php?category=<?= $row['id'] ?>">
                                    <?php $subCat = mysqli_query($con, /** @lang text */ "SELECT * FROM subcategory WHERE `categoryid`='".$row['id']."'");
                                        while ($res = mysqli_fetch_assoc($subCat)){ ?>
                                            <li class="text-secondary"><?= $res['subcategory'] ?></li>
                                    <?php } ?>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--<div class="sidebar__filter">
            <div class="section-title">
                <h4>Shop by price</h4>
            </div>
            <div class="filter-range-wrap">
                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                     data-min="100" data-max="10000"></div>
                <div class="range-slider">
                    <div class="price-input">
                        <p>Price:</p>
                        <input type="text" id="minamount">
                        <input type="text" id="maxamount">
                    </div>
                </div>
                <a href="#">Filter</a>
        </div> -->
    </div>
</div>