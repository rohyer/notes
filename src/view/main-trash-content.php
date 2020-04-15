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

</section>