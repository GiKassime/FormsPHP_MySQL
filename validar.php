<?php 
     include $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/conexao.php"; 
   

    if (isset($_POST['login'])) {
        $login = clear($conexao,$_POST['login']);
        $senha = md5(clear($conexao,$_POST['senha']));//tratamento para evitar injeção de comandos indejejados digitados no MySQL
        echo $senha;
        $result = "SELECT * FROM usuarios WHERE BINARY login_user = '$login' AND senha = '$senha'";

        if($result = mysqli_query($conexao,$result)){ 
        $num_registros = mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
        $linha = mysqli_fetch_assoc($result);
          if ($login === $linha['login_user'] and $senha === $linha['senha']) {
            session_start();
            $_SESSION['login_user'] = $linha['login_user'];
            $_SESSION['id'] = $linha['id_usuario'];

            header("location: restrito");
          }
        }else{
            $_SESSION["mensagem"] ="Login ou senha inválidos!";  
            $_SESSION["tipo"] = "danger"; 
            header('Location: index.php');
            exit();  
        }
      }else{
        $_SESSION["mensagem"] ="Nenhum resultado encontrado no banco de dados! Tente novamente ou faça seu cadastro!";  
            $_SESSION["tipo"] = "warning"; 
            header('Location: index.php');
            exit();  
      }
     
  }
    if (!isset($_SESSION['login_user'])) {
        echo "<script>
            confirm('Faça o login primeiro!!!');
            window.location.href = 'http://localhost/FormsPHP_MySQL/index.php'; // Redireciona para a página de login
        
      </script>";
      
        exit(); 
    }else{
        $user = $_SESSION['login_user'];
    }

?>