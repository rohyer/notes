<section id="single-content-category" class="main-content open-menu-for-content">

<?php
require_once "./src/model/Note.php";

$idCategory = $_GET['idcategory'];

$objNote = new Note();
$listNotes = $objNote->listNotes($_SESSION['user_datas']['id'], $idCategory);

foreach ($listNotes as $value) { ?>
    <div class="single-note">
        <div class="title-single-note"><?php echo $value['titlenote']; ?></div>
        <div class="description-single-note"><?php echo $value['descriptionnote']; ?></div>
    </div>
<?php } ?>

</section>