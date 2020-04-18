<!-- Modal Add Note -->
<?php

require_once "../User.php";
require_once "../Note.php";
require_once "../Category.php";

$objUser = new User();
$objNote = new Note();
$objCategory = new Category();

// Note Register
if (isset($_POST['btnRegisterNote'])) {
  if ($objNote->registerNote($_POST)) {
    header('location: ' . $_SERVER['HTTP_REFERER'] . '');
  }
}

// Category Register
if (isset($_POST['btnRegisterCategory'])) {
  if ($objCategory->registerCategory($_POST)) {
    header('location: ' . $_SERVER['HTTP_REFERER'] . '');
  }
}

// Category Update
if (isset($_POST['btnUpdateCategory'])) {
  if ($objCategory->updateCategory($_POST)) {
    header('location: ' . $_SERVER['HTTP_REFERER'] . '');
  }
}

// Note Update
if (isset($_POST['btnUpdateNote'])) {
    if ($objNote->updateNote($_POST)) {
        header('location: ' . $_SERVER['HTTP_REFERER'] . '');
    }
}

// Note Restore
if (isset($_POST['btnRestoreNote'])) {
    if ($objNote->restoreNote($_POST)) {
        header('location: ' . $_SERVER['HTTP_REFERER'] . '');
    } else {
        echo "<script type='text/javascript'>alert('Erro ao restaurar nota');</script>";
    }
}

// Theme Change
if (isset($_POST['btnChangeTheme'])) {
    if ($objUser->changeTheme($_POST)) {
        header('location: ' . $_SERVER['HTTP_REFERER'] . '');
    } else {
        echo "<script type='text/javascript'>alert('Erro ao mudar o tema');</script>";
    }
}

?>