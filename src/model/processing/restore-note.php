<?php

require_once "../Note.php";
$objNote = new Note();

if (isset($_POST['btnRestoreNote'])) {
    if ($objNote->restoreNote($_POST)) {
        header('location: ' . $_SERVER['HTTP_REFERER'] . '');
    } else {
        echo "<script type='text/javascript'>alert('Erro ao restaurar nota');</script>";
    }
}


?>