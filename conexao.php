<?php 
//este arquivo contém a conexão com o banco de dados e o servidor, neste caso é local, e ao final estão as funções, preferi colocar aqui pois é um projeto pequeno, mas poderia ter criado um arquivo funcoes.php e usar nos  outros arquivos!!
    $server = "localhost";
    $user =  "root";
    $pass = "";
    $bd = "crud";
    
    $conexao = mysqli_connect($server,$user,$pass,$bd);
    
    function mensagem($texto,$tipo){
       echo "<div class='alert alert-$tipo'   role='alert'>$texto</div>";
    }
    function mostraData($data){
        $vetor_data = explode('-',$data);
        $escreve = $vetor_data[2]."/".$vetor_data[1]."/".$vetor_data[0];
        return $escreve;
    }//função para deixar a data no padrão que conhecemos, dia, mês e ano!
    function moverFoto($vetor_foto){
        if((!$vetor_foto['error']) and ($vetor_foto['size'] <= 5000000) ){
            $nome_arq = md5(date('Ymdhms')).".jpg";
            move_uploaded_file($vetor_foto['tmp_name'], "img/".$nome_arq);
            return $nome_arq;
        }else{
            return 0;
        }
    }//função que nomeia um arquivo de maneira que não se repita na pasta img.

?>