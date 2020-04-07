<!-- Modal Add Note -->
<?php

require_once "./Note.php";
require_once "./Category.php";

$objNote = new Note();
$objCategory = new Category();

if (isset($_POST['btnRegNote'])) {
  if ($objNote->registerNote($_POST)) {
    header('location: ' . $_SERVER['HTTP_REFERER'] . '');
  }
}

if (isset($_POST['btnRegCategory'])) {
  if ($objCategory->registerCategory($_POST)) {
    header('location: ' . $_SERVER['HTTP_REFERER'] . '');
  }
}

?>