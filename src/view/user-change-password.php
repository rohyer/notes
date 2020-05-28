<section id="user-change-password" class="main-content main-user-content open-menu-for-content">
    <div class="user-container">
        <h4>Alterar senha</h4>

        <form id="form-change-password">
            <div id="password-datas">
                <input type="hidden" name="id-user" id="id-user" value="<?php echo $_SESSION['user_datas']['id'] ?>">

                <label for="current-password"> <div class="change-password-datas">Senha atual:</div>
                    <input type="password" name="current-password" id="current-password" required>
                </label>

                <label for="new-password"> <div class="change-password-datas">Nova senha:</div>
                    <input type="password" name="new-password" id="new-password" required>
                </label>

                <label for="new-password-repeated"> <div class="change-password-datas">Repita a nova senha:</div>
                    <input type="password" name="new-password-repeated" id="new-password-repeated" required>
                </label>
            </div>

            <button type="button" id="btn-change-password" name="btnChangePassword">Alterar</button>
        </form>

        <div id="password-changed-response"></div>
    </div>
</section>