<?php 
session_start();
include_once "./restrito/conexao.php";

$login = clear($conexao,$_POST["login"]);
$query_select = "SELECT login_user FROM usuarios WHERE login_user = '$login'";
$select = mysqli_query($conexao, $query_select);//conexão bbd
$logarray = mysqli_fetch_array($select)["login_user"];//Pega no banco de dados a chave login_user e depois vai comparar para ver se ja existe um login_user assim no banco de dados
print_r($logarray);
if($logarray == $login){

    $_SESSION["mensagem"] ="Esse login já existe em nosso banco de dados, tente outro!"; 
    $_SESSION["tipo"] = "warning"; 

    header('Location: cadastro.php');
    exit(); 

}else{
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
}
?>