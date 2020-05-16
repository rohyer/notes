<!-- actions Processing -->
<?php
session_start();

require_once "../User.php";
require_once "../Note.php";
require_once "../Category.php";

$objUser = new User();
$objNote = new Note();
$objCategory = new Category();

$idUser = $_SESSION['user_datas']['id'];

// USER ************************************
// User Update
if (isset($_POST['btnUpdateUser'])) {
  if ($objUser->updateUser($_POST)) {
    header('location: ' . $_SERVER['HTTP_REFERER'] . '');
  }
}

// NOTES ************************************
// Note Register
if (isset($_POST['btnRegisterNote'])) {
  if ($objNote->registerNote($_POST)) {
    header('location: ' . $_SERVER['HTTP_REFERER'] . '');
  }
}

// Note Update
if (isset($_POST['btnUpdateNote'])) {
  if ($objNote->updateNote($_POST)) {
      header('location: ' . $_SERVER['HTTP_REFERER'] . '');
  }
}

// Note Delete
if (isset($_GET['iddeletenote'])) {
  $idNote = $_GET['iddeletenote'];
  $objNote->deleteNote($idUser, $idNote);
}

// Note Restore
if (isset($_POST['btnRestoreNote'])) {
  if ($objNote->restoreNote($_POST)) {
      header('location: ' . $_SERVER['HTTP_REFERER'] . '');
  } else {
      echo "<script type='text/javascript'>alert('Erro ao restaurar nota');</script>";
  }
}

// Note Main Delete
if (isset($_GET['idmaindeletenote'])) {
  $idNote = $_GET['idmaindeletenote'];
  $objNote->mainDeleteNote($idUser, $idNote);
}

// CATEGORY ************************************
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

// Category Delete
if ($_GET['idmaindeletecategory']) {
  $idCategory = $_GET['idmaindeletecategory'];
  $objCategory->deleteCategory($idUser, $idCategory);
}

// THEME
// Theme Change
if (isset($_POST['btnChangeTheme'])) {
    if ($objUser->changeTheme($_POST)) {
        header('location: ' . $_SERVER['HTTP_REFERER'] . '');
    } else {
        echo "<script type='text/javascript'>alert('Erro ao mudar o tema');</script>";
    }
}

?>