<?php
//este arquivo contém a conexão com o banco de dados e o servidor, neste caso é local, e ao final estão as funções, preferi colocar aqui pois é um projeto pequeno, mas poderia ter criado um arquivo funcoes.php e usar nos  outros arquivos!!//acabei passando as funcoes para outro arquivo pois estava dando erro por declarar elas mais vezes nos outros programas.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$server = "localhost";
$user =  "root";
$pass = "";
$bd = "crud";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conexao = mysqli_connect($server, $user, $pass, $bd);
} catch (mysqli_sql_exception $e) {
    $_SESSION["mensagem_bdd"] = "Ops, falha na conexão. Recarregue a página. Caso não funcione, volte outra hora!";
    $_SESSION["erro_conexao"] = true;
    header("Location:http://localhost/FormsPHP_MySql/error_page.php"); // Página para a qual você deseja redirecionar
    exit(); // Certifique-se de sair após o redirecionamento
}
include_once("funcoes.php");
?>