<?php
session_start();

$idNote = $_GET['idnote'];
$idUser = $_SESSION['user_datas']['id'];

echo $idNote;
echo $idUser;

require_once "../Note.php";
$objNote = new Note();

$objNote->deleteNote($idUser, $idNote);


?>