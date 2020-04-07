<?php

require_once "../Note.php";
$objNote = new Note();

if (isset($_POST['btnUpdateNote'])) {
    if ($objNote->updateNote($_POST)) {
        header('location: ' . $_SERVER['HTTP_REFERER'] . '');
    }
}


?>