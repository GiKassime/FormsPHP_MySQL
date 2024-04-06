<?php 
    $server = "localhost";
    $user =  "root";
    $pass = "";
    $bd = "crud";
    
    $conexao = mysqli_connect($server,$user,$pass,$bd);
    
    function mensagem($texto,$tipo){
       echo "<div class='alert alert-$tipo'   role='alert'>$texto</div>";
    }

?>