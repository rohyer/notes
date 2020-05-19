<?php

// include_once "./src/model/User.php";
// $objUserProfile = new User();

// $currentPassword = $objUserProfile->verifyCurrentPassword($_SESSION['user_datas']['id']);

// var_dump($currentPassword);
?>


<section id="user-change-password" class="main-user-content open-menu-for-content">
    <div class="user-container">
        <h4>Alterar senha</h4>

        <form action="./src/model/processing/processing.php" method="post">

            <input type="hidden" name="id-user" value="<?php echo $_SESSION['user_datas']['id'] ?>">

            <label for="current-password">Senha atual:
                <input type="password" name="current-password" id="current-password" required>
            </label>

            <label for="new-password">Nova senha:
                <input type="password" name="new-password" id="new-password" required>
            </label>

            <label for="new-password-repeated">Repita a nova senha:
                <input type="password" name="new-password-repeated" id="new-password-repeated" required>
            </label>

            <button type="submit" name="btnChangePassword">Alterar</button>
        </form>
    </div>
</section>