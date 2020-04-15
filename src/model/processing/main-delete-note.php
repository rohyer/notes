<?php
session_start();

$idNote = $_GET['idnote'];
$idUser = $_SESSION['user_datas']['id'];

require_once "../Note.php";
$objNote = new Note();

$objNote->mainDeleteNote($idUser, $idNote);


?>