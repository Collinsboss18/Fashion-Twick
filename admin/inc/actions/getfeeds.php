<?php
/** Categories Count */
$categoryResult = mysqli_query($con, /** @lang text */ "SELECT * FROM category");
$categoryCount = mysqli_num_rows($categoryResult);
/** Products Count */
$productResult = mysqli_query($con, /** @lang text */ "SELECT * FROM products");
$productCount = mysqli_num_rows($productResult);
/** Sub Category Count */
$subCatResult = mysqli_query($con, /** @lang text */ "SELECT * FROM subcategory");
$subCatCount = mysqli_num_rows($subCatResult);
/** Notification Count */
$f1 = "00:00:00"; $from = date('Y-m-d') . " " . $f1; $t1 = "23:59:59"; $to = date('Y-m-d') . " " . $t1;
$notResult = mysqli_query($con, /** @lang text */ "SELECT * FROM `message` WHERE `isActive`=1 AND `date` BETWEEN '$from' AND '$to'");
$notCount = mysqli_num_rows($notResult);

