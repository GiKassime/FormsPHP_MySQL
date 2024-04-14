<?php session_start();?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./restrito/css/bootstrap.min.css" >
    <link rel="stylesheet" href="./restrito/css/style.css" >
  </head>
  <body style="background-color: #FFF7FC;">
  <?php include_once './restrito/partials/nav.php'?>

    <div class="container">
        <div class="row  w-100 p-3 d-flex flex-column text-center  justify-content-center" style="margin:1%;">
            <div class="col">
            <h1  style="font-size:calc(1.73vw + 48.74px);">Cadastro</h1>
              <form action="./cadastro_script.php" method="POST">
              <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Login</label>
              <input type="text" class="form-control" name="login" id="login" required>
              <div id="loginError" class="text-danger"></div>
            </div>

            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Senha</label>
              <input type="password" class="form-control" id="senha" name="senha" required>
              <small id="senhaError" class="form-text text-danger"></small>
            </div>
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
              </form>
            </div>
        </div>    
    </div>
    
    <script>
    document.getElementById("login").addEventListener("input", function() {
        let login = this.value;
        let loginError = document.getElementById("loginError");
        let submitButton = document.querySelector("button[type='submit']");

        if (login.trim() !== "") {
            // Fazer a requisição AJAX
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./verifica_login.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    
                    if (response.status === "error") {
                        loginError.innerHTML = response.message;
                        submitButton.disabled = true; // Desativar o botão de envio
                    } else {
                        loginError.innerHTML = "";
                        submitButton.disabled = false; // Ativar o botão de envio
                    }
                }
            };

            xhr.send("login=" + login);
        } else {
            loginError.innerHTML = "";
            submitButton.disabled = false; // Ativar o botão de envio
        }
    });
</script>
<script>
    document.getElementById("senha").addEventListener("input", function() {
        let senha = this.value;
        let senhaError = document.getElementById("senhaError");
        let submitButton = document.querySelector("button[type='submit']");

        // Verificar a força da senha
        let strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");
        let mediumRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.{6,})");
        
        if (strongRegex.test(senha)) {
            senhaError.innerHTML = "";
            submitButton.disabled = false; // Ativar o botão de envio
        } else if (mediumRegex.test(senha)) {
            senhaError.innerHTML = "Senha média (use letras maiúsculas, minúsculas e números).";
            submitButton.disabled = true; // Desativar o botão de envio
        } else {
            senhaError.innerHTML = "Senha fraca (use letras maiúsculas, minúsculas, números e pelo menos 8 caracteres).";
            submitButton.disabled = true; // Desativar o botão de envio
        }
    });
</script>
    <?php include_once './restrito/partials/scripts.php';?>
   

  </body>
</html>
