<?php 
session_start();
include_once "./restrito/conexao.php";

$login = clear($conexao,$_POST["login"]);

    $senha = md5(clear($conexao,$_POST["senha"]));//pega a senha do usuário e criptografa ela
    $query = "INSERT INTO usuarios (login_user,senha) VALUES ('$login','$senha')";
    $insert = mysqli_query($conexao,$query);

    if($insert){
        $_SESSION["mensagem"] ="$login casdastrado com sucesso! Agora faça o login!";  
        $_SESSION["tipo"] = "success"; 
        header('Location: index.php');
        exit();  
      
    }else{
        $_SESSION["mensagem"] ="Não foi possivel cadastrar $login! Tente outra vez!"; 
        $_SESSION["tipo"] = "danger"; 

        header('Location: cadastro.php');
        exit(); 
    }

?>