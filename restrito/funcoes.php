<?php

function mensagem($texto, $tipo){
    echo "<div class='alert alert-$tipo'   role='alert' id='alert'>$texto</div>";
}

function mostraData($data){
    $vetor_data = explode('-', $data);
    $escreve = $vetor_data[2]."/".$vetor_data[1]."/".$vetor_data[0];
    return $escreve;
}

function moverFoto($vetor_foto){
    if ($vetor_foto['size'] != 0) {
        $vtipo = explode('/',$vetor_foto['type']);
        $tipo = $vtipo[0] ?? '';
        $extensao =  ".".$vtipo[1] ?? '';
        if((!$vetor_foto['error']) and ($vetor_foto['size'] <= 5000000) and ($tipo == "image") and ($extensao != ".svg" and $extensao != ".svg+xml")){
            $nome_arq = md5(date('Ymdhms')).$extensao;
            move_uploaded_file($vetor_foto['tmp_name'], "../img/".$nome_arq);
            return $nome_arq;
        } else {
            return 0;
        }
    } else {
        return null;
    }
}

function verificaImagem($nome_imagem){
    if(!file_exists("../img/".$nome_imagem) or $nome_imagem == '0' or $nome_imagem === "" or $nome_imagem === null){
        $nome_imagem = "sem_foto.jpg";
    }
    return $nome_imagem;
}

function clear($conexao, $texto){
    $texto = mysqli_real_escape_string($conexao, $texto);
    $texto = htmlspecialchars($texto);
    return $texto;
}
function excluiImagem($imagem) {
    $caminho_imagem = "../img/" . $imagem;

    if (is_file($caminho_imagem)) {
        if (unlink($caminho_imagem)) {
            return true; // Imagem excluída com sucesso
        } else {
            return mensagem("Falha ao excluir a imagem", "danger"); // Falha ao excluir a imagem
        }
    } 
    
}
?>
