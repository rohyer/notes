<section id="single-content-category" class="main-content open-menu-for-content">

    <?php
    require_once "./src/model/Note.php";

    $idUser = $_SESSION['user_datas']['id'];
    $idCategory = $_GET['idcategory'];
    $nameCategory = $_GET['namecategory'];

    $objNote = new Note();
    $listMarkedNotes = $objNote->listNotes($idUser, $idCategory);
    $listNoMarkedNotes = $objNote->listNoMarkedNotes($idUser, $idCategory);

    ?>

    <div id="title-category-name"><?php echo $nameCategory; ?></div>

    <div class="note-container">
        <div class="sec-marked-notes">
            <h4>Marcadas</h4>
            <div class="marked-notes">
                <?php
                foreach ($listMarkedNotes as $value) { ?>
                <div class="single-note">
                    <div class="title-single-note"><?php echo $value['titlenote']; ?></div>
                    <?php if ($value['markednote'] == 1) { ?>
                        <div class="marked-single-note"><i class="fas fa-check"></i></div>
                    <?php } ?>
                    <div class="description-single-note"><?php echo $value['descriptionnote']; ?></div>
                    <div class="options-single-note">
                        <div class="colors-options">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="all-options-single-note">
                            <i class="fas fa-ellipsis-v"></i>
                            <div class="container-all-options">
                                <button data-toggle="modal" data-target="#update-note-modal" id="update-modal">Editar</button>
                                <button data-toggle="modal" data-target="#delete-note-modal" data-id="<?php echo $value['idnote']; ?>" class="delete-note">Excluir</button>
                            </div>
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
                <div class="single-note">
                    <div class="title-single-note"><?php echo $value['titlenote']; ?></div>
                    <div class="description-single-note"><?php echo $value['descriptionnote']; ?></div>
                    <div class="options-single-note">
                        <div class="colors-options">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="all-options-single-note">
                            <i class="fas fa-ellipsis-v"></i>
                            <div class="container-all-options">
                                <button data-toggle="modal" data-target="#update-note-modal" id="update-modal">Editar</button>
                                <button data-toggle="modal" data-target="#delete-note-modal" data-id="<?php echo $value['idnote']; ?>" class="delete-note">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>