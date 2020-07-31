<?php

require_once "./src/model/Note.php";
$objNote = new Note();

$idUser = $_SESSION['user_datas']['id'];
$idCategory = 1;

$listMarkedNotes = $objNote->listNotes($idUser, $idCategory);
$listNoMarkedNotes = $objNote->listNoMarkedNotes($idUser, $idCategory);

?>

<section id="main-content" class="main-content open-menu-for-content">
    <div class="note-container">
        <?php if (count($listMarkedNotes) >= 1) { ?>
            <div class="sec-marked-notes">
                <?php if (count($listMarkedNotes) >= 1 && count($listNoMarkedNotes) >= 1) { ?>
                    <h4>Marcadas</h4>
                <?php } ?>
                <div class="marked-notes">
                    <?php 
                    foreach ($listMarkedNotes as $value) { ?>

                        <div class="single-note" data-toggle="modal" data-target="#update-note-modal" data-id="<?php echo $value['idnote']; ?>" class="update-note">

                            <div class="title-single-note"><?php echo $value['titlenote']; ?></div>

                            <input type="hidden" name="category-single-note" class="category-single-note" value="<?php echo $value['idcategory'] ?>">

                            <?php if ($value['markednote'] == 1) { ?>
                                <div class="marked-single-note"><i class="fas fa-check"></i></div>
                                <input type="hidden" name="idnote" value="<?php echo $value['markednote'] ?>" class="marked-single-note-value" readonly>
                            <?php } ?>

                            <div class="description-single-note"><?php echo $value['descriptionnote']; ?></div>

                            <div class="options-single-note">
                                <div data-toggle="modal" data-target="#delete-note-modal" data-id="<?php echo $value['idnote']; ?>" class="delete-note">
                                    <i class="fas fa-trash-alt"></i>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <?php if (count($listNoMarkedNotes) >= 1) { ?>
            <div class="sec-no-marked-notes">
                <?php if (count($listNoMarkedNotes) >= 1 && count($listMarkedNotes) >= 1) { ?>
                    <h4>Outras</h4>
                <?php } ?>
                <div class="no-marked-notes">
                    <?php 
                    foreach ($listNoMarkedNotes as $value) { ?>

                        <div class="single-note" data-toggle="modal" data-target="#update-note-modal" data-id="<?php echo $value['idnote']; ?>" class="update-note">

                            <div class="title-single-note"><?php echo $value['titlenote']; ?></div>
                            
                            <input type="hidden" name="category-single-note" class="category-single-note" value="<?php echo $value['idcategory'] ?>">

                            <input type="hidden" name="idnote" value="<?php echo $value['markednote']; ?>" class="marked-single-note-value">

                            <div class="description-single-note"><?php echo $value['descriptionnote']; ?></div>

                            <div class="options-single-note">
                                <div data-toggle="modal" data-target="#delete-note-modal" data-id="<?php echo $value['idnote']; ?>" class="delete-note">
                                    <i class="fas fa-trash-alt"></i>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <?php if (count($listMarkedNotes) == 0 && count($listNoMarkedNotes) == 0) {  ?>
            <h4 id="content-warning">Cadastre uma nota :D</h4>
        <?php } ?>
    </div>
</section>