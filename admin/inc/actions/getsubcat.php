<?php
include('../database/config.php');

if (!empty($_POST["catId"])) {
    $id = intval($_POST['catId']);
    $query = "SELECT * FROM `subcategory` WHERE `categoryid`='$id'";
    $result= select_query($query);
    ?>
    <option value="">Select Subcategory</option>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['subcategory']); ?></option>
        <?php
    }
}