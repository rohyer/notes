<?php

require_once "../User.php";
$objUser = new User();

if (isset($_POST['RegTheme'])) {
    if ($objUser->changeTheme($_POST)) {
        header('location: ' . $_SERVER['HTTP_REFERER'] . '');
    } else {
        echo "<script type='text/javascript'>alert('Erro ao mudar o tema');</script>";
    }
}


?>