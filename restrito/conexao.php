

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
        if ($vetor_foto['size'] != 0) {
              $vtipo = explode('/',$vetor_foto['type']);
              $tipo = $vtipo[0] ?? '';
              $extensao =  ".".$vtipo[1] ?? '';
              if((!$vetor_foto['error']) and ($vetor_foto['size'] <= 5000000) and ($tipo == "image") and ($extensao != ".svg" and       $extensao != ".svg+xml")){
                 $nome_arq = md5(date('Ymdhms')).$extensao;
                 move_uploaded_file($vetor_foto['tmp_name'], "img/".$nome_arq);
                return $nome_arq;
            }else{
            return 0;
            }
        }else {
           return null;
        }
    }//função que nomeia um arquivo de maneira que não se repita na pasta img.
    function verificaImagem($nome_imagem){
        if(!file_exists("img/".$nome_imagem) or $nome_imagem == '0' or $nome_imagem === "" or $nome_imagem === null){
            $nome_imagem = "sem_foto.jpg";
        }
        return $nome_imagem;
    }
    function clear($conexao, $texto){
        $texto = mysqli_real_escape_string($conexao, $texto);
        $texto = htmlspecialchars($texto);
        return $texto;


    }
?>