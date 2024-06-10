<?php session_start();?>
<!doctype html>
<html lang="pt-br" data-bs-theme="light">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="./restrito/css/bootstrap.min.css" >
    <link rel="stylesheet" href="./restrito/css/style.css" >
  </head>
  <body  >
  <?php include_once './restrito/partials/nav.php'?>
   
    <div class="container" >
        <div class="row  w-100 p-3 d-flex flex-column text-center  justify-content-center" style="margin:1%;">
            <div class="col">
            <h1  style="font-size:calc(1.73vw + 48.74px);">Login</h1>
              <form action="validar.php" method="POST">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <input type="text" class="form-control"   name="login" required>
                <small  id="emailHelp" class="form-text text-muted">Entre com seus dados de acesso</small>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Senha</label>
              <input type="password" class="form-control" name="senha" required>
            </div>
            
            <button type="submit" class="btn btn-secondary">Acessar</button>
              </form>
              <a href="./cadastro.php" class="btn">Cadastre-se</a>
 
            </div>
            <?php include_once "restrito/conexao.php";?>
            <div class="alert  alert-dismissible fade show" id="alert" role="alert">
            <?php include_once "restrito/conexao.php"; 
            mensagem(isset($_SESSION["mensagem"]) ? $_SESSION["mensagem"] : '',isset($_SESSION["tipo"]) ? $_SESSION["tipo"] : 'primary');?> 
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>    
    </div>
    
    <script>
      
      let alerta = document.getElementById("alert");
      alerta.removeAttribute('hidden');
      if (alerta.innerText.trim() !== "") {
        alerta.removeAttribute('hidden');
      } else {
        alerta.remove(); // Remove o elemento se a mensagem estiver vazia
      }
      <?php unset($_SESSION["mensagem"]); ?> 
     </script>
    
    <?php include_once './restrito/partials/scripts.php';?>
    
  </body>
</html>
