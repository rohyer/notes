<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./assets/css/style.css">

    <title>Register</title>
  </head>
  <body>

  <?php

  session_start();
  if ((isset ($_SESSION['logado']) == true) and (isset ($_SESSION['password']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
  }
  

  require_once './src/model/User.php';
  $objUserRegister = new User();

  if (isset($_POST['btnRegister'])) {

    $password = $_POST['password-register'];
    $confirmPassword = $_POST['password-confirm-register'];

    if ($password === $confirmPassword) {
      if ($objUserRegister->registerUser($_POST) == true) {
        echo "<script>alert('Cadastro Realizado')</script>";
      }
    } else {
      echo "<script>alert('Senhas não conferem')</script>";
    }
  }


  ?>

    <div id="register-box">
      <h1>Notes</h1>
      <h2>Faça seu cadastro</h2>

      <form action="" method="post">
        <input type="text" name="name-register" class="register-info" placeholder="Nome" required>

        <input type="email" name="email-register" class="register-info" placeholder="Email" required>

        <input type="password" name="password-register" class="register-info register-half-size" placeholder="Senha" required>

        <input type="password" name="password-confirm-register" class="register-info register-half-size" placeholder="Confirme sua senha" required>

        <select name="sex-register" class="register-info register-half-size" required>
          <option value="">Sexo</option>
          <option value="M">Masculino</option>
          <option value="F">Feminino</option>
        </select>

        <input type="tel" name="cellphone-register" class="register-info register-half-size" placeholder="celular" required>

        <select name="state-register" class="register-info register-half-size" required>
          <option value="AC">AC</option>
          <option value="AL">AL</option>
          <option value="AP">AP</option>
          <option value="AM">AM</option>
          <option value="BA">BA</option>
          <option value="CE">CE</option>
          <option value="DF">DF</option>
          <option value="ES">ES</option>
          <option value="GO">GO</option>
          <option value="MA">MA</option>
          <option value="MT">MT</option>
          <option value="MS">MS</option>
          <option value="MG">MG</option>
          <option value="PA">PA</option>
          <option value="PB">PB</option>
          <option value="PR">PR</option>
          <option value="PE">PE</option>
          <option value="PI">PI</option>
          <option value="RJ">RJ</option>
          <option value="RN">RN</option>
          <option value="RS">RS</option>
          <option value="RO">RO</option>
          <option value="RR">RR</option>
          <option value="SC">SC</option>
          <option value="SP">SP</option>
          <option value="SE">SE</option>
          <option value="TO">TO</option>
        </select>

        <input type="text" name="city-register" class="register-info register-half-size" placeholder="Cidade" required>

        <a href="./login.php">Voltar</a>

        <input type="submit" value="Cadastrar" name="btnRegister">
      </form>
    </div>
    
    <script src="./assets/js/script.js"></script>
  </body>
</html>