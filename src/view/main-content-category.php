<section id="main-content-category" class="main-content open-menu-for-content">

<?php

require_once "./src/model/Category.php";

$objCategory = new Category();
$allCategories = $objCategory->listCategories($_SESSION['user_datas']['id']);

$amountCategories = count($allCategories);
$moduleAmountCategories = $amountCategories % 2;

?>

<ul id="all-categories">
<?php foreach ($allCategories as $value) { ?>

    <?php if (($amountCategories == 1) && ($moduleAmountCategories != 0)) { ?>
        <a href="#" class="categories-first-odd"><li><?php echo $value['namecategory']; ?></li></a>
    <?php } elseif (($amountCategories == 2) && ($moduleAmountCategories == 0)) { ?>
        <a href="#" class="categories-first-even"><li><?php echo $value['namecategory']; ?></li></a>
    <?php } elseif (($amountCategories == 3) && ($moduleAmountCategories != 0)) { ?>
        <a href="#" class="categories-odd"><li><?php echo $value['namecategory']; ?></li></a>
    <?php } elseif ($amountCategories >= 4) { ?>
        <a href="#" class="categories-even"><li><?php echo $value['namecategory']; ?></li></a>
    <?php } ?>
    
<?php } ?>
</ul>

</section>