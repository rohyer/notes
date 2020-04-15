<?php

require_once "./src/model/Note.php";
$objNote = new Note();

$idUser = $_SESSION['user_datas']['id'];

$listDeletedNotes = $objNote->listTrashNotes($idUser);

?>

<section id="main-trash-content" class="main-content open-menu-for-content">
    <div class="note-container">
        <div class="deleted-notes">
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
                        <div class="all-trash-options"><i class="fas fa-ellipsis-v"></i>
                            <div class="trash-options">
                                <div class="main-restore-note">Restaurar</div>
                                <div data-toggle="modal" data-target="#delete-note-modal" data-id="<?php echo $value['idnote']; ?>" class="main-delete-note">Deletar</div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    

</section>