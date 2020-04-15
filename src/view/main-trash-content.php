<section id="main-trash-content">

    <?php

    require_once "./src/model/Note.php";
    $objNoteDeleted = new Note();

    $idTrashUser = $_SESSION['user_datas']['id'];

    $listDeletedNotes = $objNoteDeleted->listTrashNotes($idTrashUser);

    foreach ($listDeletedNotes as $value) {
        echo $value['titlenote'];
    }
    ?>

    <div class="note-container">
        <?php foreach ($listDeletedNotes as $value) { ?>
        <div class="single-note">
            <div class="title-single-note"><?php echo $value['titlenote']; ?></div>
            <input type="hidden" name="category-single-note" class="category-single-note" value="<?php echo $value['idcategory'] ?>">
            <?php if ($value['markednote'] == 1) { ?>
                <div class="marked-single-note"><i class="fas fa-check"></i></div>
                <input type="hidden" name="idnote" value="<?php echo $value['markednote'] ?>" class="marked-single-note-value" readonly>
            <?php } ?>
            <div class="description-single-note"><?php echo $value['descriptionnote']; ?></div>
            <div class="options-single-note">
                <div class="colors-options">
                    <i class="fas fa-palette"></i>
                </div>
                <div data-toggle="modal" data-target="#delete-note-modal" data-id="<?php echo $value['idnote']; ?>" class="delete-note">
                    <i class="fas fa-trash-alt"></i>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
    

</section>