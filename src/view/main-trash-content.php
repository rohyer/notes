<?php

require_once "./src/model/Note.php";
$objNote = new Note();

$idUser = $_SESSION['user_datas']['id'];

$listDeletedNotes = $objNote->listTrashNotes($idUser);

?>

<section id="main-trash-content" class="main-content open-menu-for-content">
    <?php if (count($listDeletedNotes) > 0) { ?>
        <div id="title-trash">Lixeira</div>
    <?php } ?>
    <div class="note-container">
        <div class="deleted-notes">
            <?php foreach ($listDeletedNotes as $value) { ?>

                <div class="trash-single-note" data-toggle="modal" data-target="#restore-note-modal" data-trash-id="<?php echo $value['idnote']; ?>">
                    <div class="title-single-note"><?php echo $value['titlenote']; ?></div>

                    <input type="hidden" name="category-single-note" class="category-single-note" value="<?php echo $value['idcategory'] ?>">

                    <?php if ($value['markednote'] == 1) { ?>
                        <div class="marked-single-note"><i class="fas fa-check"></i></div>
                        <input type="hidden" name="idnote" value="<?php echo $value['markednote'] ?>" class="marked-single-note-value" readonly>
                    <?php } else { ?>
                        <input type="hidden" name="idnote" value="<?php echo $value['markednote'] ?>" class="marked-single-note-value" readonly>
                    <?php } ?>

                    <div class="description-single-note"><?php echo $value['descriptionnote']; ?></div>

                    <div class="options-single-note" id="trash-content-options">

                        <form action="./src/model/processing/processing.php" method="POST" id="restore-note-form">
                            <input type="hidden" name="restore-id-user" value="<?php echo $idUser; ?>" readonly>
                            <input type="hidden" name="restore-id-note" value="<?php echo $value['idnote']; ?>" readonly>
                            <input type="hidden" name="restore-id-category" value="<?php echo $value['idcategory']; ?>" readonly>

                            <button type="submit" name="btnRestoreNote" class="action-trash-note"><i class="fas fa-trash-restore"></i></button>
                        </form>

                        <div data-toggle="modal" data-target="#delete-note-modal" data-id="<?php echo $value['idnote']; ?>" class="action-trash-note delete-trash-note"><i class="fas fa-trash-alt"></i></div>
                            
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php if (count($listDeletedNotes) == 0) { ?>
                <h4 id="trash-content-warning">Lixeira vazia</h4>
        <?php } ?>
    </div>
    

</section>