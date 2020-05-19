<?php

session_start();

require_once "../User.php";

$objUser = new User();

if ($objUser->changePassword($_POST)) {
    echo json_encode("Deu certo");
}


?>