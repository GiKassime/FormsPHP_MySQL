<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="restrito/css/bootstrap.min.css" >
  </head>
  <body style="background-color: #FFF7FC;">
    <div class="container">
        <div class="row  w-100 p-3 d-flex flex-column text-center  justify-content-center" style="margin:1%;">
            <div class="col">
            <h1  style="font-size:calc(1.73vw + 48.74px);">Login</h1>
              <form action="index.php" method="POST">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <input type="text" class="form-control"   name="login">
                <small  id="emailHelp" class="form-text text-muted">Entre com seus dados de acesso</small>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Senha</label>
              <input type="password" class="form-control" name="senha">
            </div>
            
            <button type="submit" class="btn btn-primary">Acessar</button>
              </form>
              <p>Respostas do site</p>
              <?php 
               include "restrito/conexao.php";
              if (isset($_POST['login'])) {
                  $login = clear($conexao,$_POST['login']);
                  $senha = clear($conexao,$_POST['senha']);//tratamento para evitar injeção de comandos indejejados digitados no MySQL
                 
                  $sql = "SELECT * FROM usuarios WHERE login_user = '$login' AND senha = '$senha'";

                  if($result = mysqli_query($conexao,$sql)){ 
                  $num_registros = mysqli_num_rows($result);
                  if ($num_registros == 1) {
                  $linha = mysqli_fetch_assoc($result);
                    if ($login == $linha['login_user'] and $senha == $linha['senha']) {
                      session_start();
                      $_SESSION['login_user'] = $linha['nome'];
                      header("location: restrito");
                    }else{
                      echo "Login inválido";
                    }
                  }else{
                  echo "Login ou senha não encontrados ou inválido";
                  }
                }else{
                  echo "Nenhum resultado encontrado no banco de dados";
                }
               
            }
              
              ?>
            </div>
        </div>    
    </div>
    
   
   
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>
