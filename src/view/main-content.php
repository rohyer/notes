<section id="main-content" class="main-content open-menu-for-content">

    <?php
    
    require_once "./src/model/Note.php";
    $objNote = new Note();

    $idUser = $_SESSION['user_datas']['id'];
    $idCategory = 1;

    $listNotes = $objNote->listNotes($idUser, $idCategory);

    ?>
    <div class="note-container">
        <?php 
        foreach ($listNotes as $value) { ?>
        <div class="single-note">
            <div class="title-single-note"><?php echo $value['titlenote']; ?></div>
            <div class="description-single-note"><?php echo $value['descriptionnote']; ?></div>
            <!-- <input type="hidden" name="id-note" data-id="<?php echo $value['idnote']; ?>" readonly> -->
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
</section>