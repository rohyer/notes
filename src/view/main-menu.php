<?php

require_once "./src/model/Category.php";
$objCategory = new Category();
$allCategories = $objCategory->listCategories($_SESSION['user_datas']['id']);

?>

<div id="main-menu" class="opened-main-menu">
    <div id="main-menu-notes">
        <h4><a href="./index.php" id="notes">Notas</a></h4>
        <button type="button" data-toggle="modal" data-target="#add-note-modal"><i class="fas fa-plus"></i></button>

        <h4 id="category">Categorias <i id="category-arrow" class="fas fa-caret-down"></i></h4>
        <button type="button" data-toggle="modal" data-target="#add-category-modal"><i class="fas fa-plus"></i></button>
        
        <ul id="all-categories">
            <?php foreach ($allCategories as $value) { ?>

                <li>
                    <a href="./single-category.php?idcategory=<?php echo $value['idcategory'] ?>&namecategory=<?php echo $value['namecategory']; ?>"><?php echo $value['namecategory']; ?></a>
                    
                    <i class="far fa-edit" data-toggle="modal" data-target="#update-category-modal" data-id="<?php echo $value['idcategory']; ?>"></i>

                    <i class="fas fa-trash-alt delete-category" data-toggle="modal" data-target="#delete-category-modal" data-id="<?php echo $value['idcategory']; ?>"></i>
                </li>
                
            <?php } ?>
        </ul>
    </div>

    <div id="main-menu-trash">
        <h4><a href="./trash.php" id="trash">Lixeira</a></h4>
    </div>
</div>