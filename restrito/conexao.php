<?php
//este arquivo contém a conexão com o banco de dados e o servidor, neste caso é local, e ao final estão as funções, preferi colocar aqui pois é um projeto pequeno, mas poderia ter criado um arquivo funcoes.php e usar nos  outros arquivos!!//acabei passando as funcoes para outro arquivo pois estava dando erro por declarar elas mais vezes nos outros programas.
$server = "localhost";
$user =  "root";
$pass = "";
$bd = "crud";

$conexao = mysqli_connect($server,$user,$pass,$bd);

include_once("funcoes.php");
?>
