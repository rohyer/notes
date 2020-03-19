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
            <div class="options-single-note">
                <div class="colors-options">
                    <i class="fas fa-palette"></i>
                </div>
                <div class="all-options-single-note">
                    <i class="fas fa-ellipsis-v"></i>
                    <div class="container-all-options">
                        <span>Editar nota</span>
                        <span>Excluir nota</span>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>