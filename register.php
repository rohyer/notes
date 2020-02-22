<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./assets/css/style.css">

    <title>Register</title>
  </head>
  <body>

    <div id="register-box">
      <h1>Notes</h1>
      <h2>Faça seu cadastro</h2>

      <form action="" method="post">
        <input type="text" name="name-register" class="register-info" placeholder="Nome">

        <input type="email" name="email-register" class="register-info" placeholder="Email">

        <input type="password" name="password-register" class="register-info" placeholder="Senha">

        <input type="password" name="password-register-confirm" class="register-info" placeholder="Confirme sua senha">

        <input type="tel" name="cell-phone-register" class="register-info" placeholder="celular">

        <select name="sex-register" id="">
          <option value="M">Masculino</option>
          <option value="F">Feminino</option>
        </select>

        <select name="state-register" id="">
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

        <input type="text" name="city-register" id="">

        <a href="./login.php">Voltar</a>

        <input type="submit" value="Cadastrar" name="btnCadastrar">
      </form>
    </div>
    
    <script src="./assets/js/script.js"></script>
  </body>
</html>