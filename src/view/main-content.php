<section id="main-content" class="main-content open-menu-for-content">

    <?php
    
    require_once "./src/model/Note.php";
    $objNote = new Note();

    $idUser = $_SESSION['user_datas']['id'];
    $idCategory = 1;

    $listMarkedNotes = $objNote->listNotes($idUser, $idCategory);
    $listNoMarkedNotes = $objNote->listNoMarkedNotes($idUser, $idCategory);

    ?>
    <div class="note-container">
        <div class="sec-marked-notes">
            <h4>Marcadas</h4>
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
        </div>
        <div class="sec-no-marked-notes">
            <h4>Outras</h4>
            <div class="no-marked-notes">
                <?php 
                foreach ($listNoMarkedNotes as $value) { ?>
                <div class="single-note" data-toggle="modal" data-target="#update-note-modal" data-id="<?php echo $value['idnote']; ?>" class="update-note">
                    <div class="title-single-note"><?php echo $value['titlenote']; ?></div>
                    
                    <input type="hidden" name="category-single-note" class="category-single-note" value="<?php echo $value['idcategory'] ?>">
                    <input type="hidden" name="idnote" value="<?php echo $value['markednote']; ?>" class="marked-single-note-value">
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
        </div>
    </div>
</section>