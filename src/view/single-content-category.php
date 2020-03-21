<section id="single-content-category" class="main-content open-menu-for-content">

    <?php
    require_once "./src/model/Note.php";

    $idCategory = $_GET['idcategory'];
    $nameCategory = $_GET['namecategory'];

    $objNote = new Note();
    $listNotes = $objNote->listNotes($_SESSION['user_datas']['id'], $idCategory);

    ?>

    <div id="title-category-name"><?php echo $nameCategory; ?></div>

    <div class="note-container">
        <?php 
        foreach ($listNotes as $value) { ?>
        <div class="single-note">
            <div class="title-single-note"><?php echo $value['titlenote']; ?></div>
            <div class="description-single-note"><?php echo $value['descriptionnote']; ?></div>
            <input type="hidden" name="id-note" value="<?php echo $value['idnote'] ?>" readonly>
            <div class="options-single-note">
                <div class="colors-options">
                    <i class="fas fa-palette"></i>
                </div>
                <div class="all-options-single-note">
                    <i class="fas fa-ellipsis-v"></i>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>