<?php

require_once "./src/model/Category.php";

$objCategory = new Category();
$allCategories = $objCategory->listCategories($_SESSION['user_datas']['id']);

$amountCategories = count($allCategories);
$moduleAmountCategories = $amountCategories % 2;

?>

<div id="main-menu" class="opened-main-menu">
    <div id="main-menu-notes">
        <h4><a href="./index.php" id="notes">Notas</a></h4>
        <button type="button" data-toggle="modal" data-target="#add-note-modal"><i class="fas fa-plus"></i></button>

        <h4 id="category"><!--<a href="./category.php" id="category">-->Categorias <i id="category-arrow" class="fas fa-caret-down"></i><!--</a>--></h4>
        <button type="button" data-toggle="modal" data-target="#add-category-modal"><i class="fas fa-plus"></i></button>
        
        <ul id="all-categories">
        <?php foreach ($allCategories as $value) { ?>

            <?php if (($amountCategories == 1) && ($moduleAmountCategories != 0)) { ?>
                <a href="./single-category.php?idcategory=<?php echo $value['idcategory'] ?>&namecategory=<?php echo $value['namecategory']; ?>" class="categories-first-odd"><li><?php echo $value['namecategory']; ?></li></a>
            <?php } elseif (($amountCategories == 2) && ($moduleAmountCategories == 0)) { ?>
                <a href="./single-category.php?idcategory=<?php echo $value['idcategory'] ?>&namecategory=<?php echo $value['namecategory']; ?>" class="categories-first-even"><li><?php echo $value['namecategory']; ?></li></a>
            <?php } elseif (($amountCategories == 3) && ($moduleAmountCategories != 0)) { ?>
                <a href="./single-category.php?idcategory=<?php echo $value['idcategory'] ?>&namecategory=<?php echo $value['namecategory']; ?>" class="categories-odd"><li><?php echo $value['namecategory']; ?></li></a>
            <?php } elseif ($amountCategories >= 4) { ?>
                <a href="./single-category.php?idcategory=<?php echo $value['idcategory'] ?>&namecategory=<?php echo $value['namecategory']; ?>" class="categories-even"><li><?php echo $value['namecategory']; ?></li></a>
            <?php } ?>
            
        <?php } ?>
        </ul>
    </div>

    <div id="main-menu-trash">
        <h4><a href="./trash.php" id="trash">Lixeira</a></h4>
    </div>
</div>