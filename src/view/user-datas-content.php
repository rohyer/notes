<?php

require_once "./src/model/User.php";
$objUser = new User();

$listDatasUser = $objUser->listDatasUser($_SESSION['user_datas']['id']);

?>

<section id="user-content" class="main-content main-user-content open-menu-for-content">
    <div class="user-container">
        <h4>Meu dados</h4>

        <?php foreach($listDatasUser as $value) { ?>

            <div class="main-info-user"> <div class="info-user">Nome:</div> <p id="main-name-user"> <?php echo $value['nameuser'] ?></p></div>
            <div class="main-info-user"> <div class="info-user">Email:</div> <p id="main-email-user"> <?php echo $value['emailuser'] ?></p></div>
            <div class="main-info-user"> <div class="info-user">Sexo:</div> <p id="main-sex-user"> <?php echo $value['sexuser'] ?></p></div>
            <div class="main-info-user"> <div class="info-user">Celular:</div> <p id="main-cellphone-user"> <?php echo $value['cellphoneuser'] ?></p></div>
            <div class="main-info-user"> <div class="info-user">Estado:</div> <p id="main-state-user"> <?php echo $value['stateuser'] ?></p></div>
            <div class="main-info-user"> <div class="info-user">Cidade:</div> <p id="main-city-user"> <?php echo $value['cityuser'] ?></p></div>

        <?php } ?>

        <button type="button" id="btn-update-user" data-toggle="modal" data-target="#update-user-modal">Alterar</button>
    </div>
</section>