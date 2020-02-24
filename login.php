<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./assets/css/style.css">

    <title>Login</title>
  </head>
  <body>

  <?php
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();

    if (isset($_SESSION['logado'])) {
      header("Location: ./index.php");
    }
  }

  require_once './src/model/User.php';
  $objUserLogin = new User();

  if (isset($_POST['btnLogin'])) {
    if ($objUserLogin->loginUser($_POST) == true) {
      header("Location: ../notes/index.php");
    } else {
      echo "<script>alert('Email ou senha incorreto');</script>";
    }
  }


  ?>
    
    <div id="login-box">
        <h1>Notes</h1>
        <h2>Faça seu login</h2>
        <form action="" method="post">
            <input type="email" name="email-login" placeholder="Email" class="login-info">
            <input type="password" name="password-login" placeholder="Senha" class="login-info">
            <a href="#" id="forgotten-password">Esqueceu seu email ou senha?</a>

            <a href="./register.php" id="link-register">Criar conta</a>
            <input type="submit" value="Entrar" name="btnLogin">
        </form>
    </div>

    <script src="./assets/js/script.js"></script>
  </body>
</html>