<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <link rel="stylesheet" href="templates/css/login.css">

  </head>
  <body>
      <div class="container">
        <form action="./templates/php/login/login.php" method="POST">
          <div class="box" >
            <h1>Bem-Vindo (a)</h1>
            <br>
            <input class="input-form" type="text" name="usuario" value="" placeholder="Registro da Matricula" id="registro">
            <input class="input-form" type="password" name="senha" value="" placeholder="Senha" id="senha">
            <br>
            <p >Esqueceu a senha? <a>Clique aqui</a></p>
            <br>
            <button type="submit" class="btn btn-lg offset-m2" name="button" id="btnLogin">ENTRAR</button>
            <br><br><br>
          </div>
        </form>
      </div>


      <!-- Compiled and minified JavaScript -->
      <script src="templates/js/jquery-3.4.1.min.js"></script>
      <script src="templates/js/bootstrap.min.js"></script>
      <script src="templates/js/index.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      
</script> 
</body>
</html>

  
  
