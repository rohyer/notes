<?php

session_start();

require_once "../User.php";

$objUser = new User();
$objUser->changePassword($_POST);



?>