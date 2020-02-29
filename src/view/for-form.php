<?php

require_once "./src/model/Note.php";
require_once "./src/model/Category.php";

$objNote = new Note();
$objCategory = new Category();

if (isset($_POST['btnRegNote'])) {
  if ($objNote->registerNote($_POST)) {
    echo "<script>alert('Nota cadastrada com sucesso');</script>";
  }
}

if (isset($_POST['btnRegCategory'])) {
  if ($objCategory->registerCategory($_POST)) {
    echo "<script>alert('Categoria cadastrada com sucesso');</script>";

  }
}

?>