<?php

require_once "./src/model/User.php";
$objUser = new User();

$listDatasUser = $objUser->listDatasUser($_SESSION['user_datas']['id']);

?>

<section id="user-content" class="main-user-content open-menu-for-content">
    <div class="user-container">
        <h4>Meu dados</h4>

        <?php foreach($listDatasUser as $value) { ?>

            <p>Nome: <?php echo $value['nameuser'] ?></p>
            <p>Email: <?php echo $value['emailuser'] ?></p>
            <p>Sexo: <?php echo $value['sexuser'] ?></p>
            <p>Celular: <?php echo $value['cellphoneuser'] ?></p>
            <p>Estado: <?php echo $value['stateuser'] ?></p>
            <p>Cidade: <?php echo $value['cityuser'] ?></p>

        <?php } ?>

        <button type="button" data-toggle="modal" data-target="#update-user-modal">Alterar dados</button>
    </div>
</section>