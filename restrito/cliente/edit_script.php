

<!doctype html>
<html lang="pt-br">
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/nav.php";?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/head.php";?>

  
  <body style="background-color: #FFF7FC;">
    <div class="container">
        <div class="row">
           <?php 
            include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/conexao.php";
            
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $data_nascimento = $_POST['data_nascimento'];
            $arquivo_foto = $_FILES['foto']; 
            $sql = "SELECT foto FROM pessoa WHERE cod_pessoa = $id";
            $nome_foto = mysqli_fetch_assoc(mysqli_query($conexao,$sql))['foto']; //recebe nome da foto do banco de dados
            if($arquivo_foto['size'] != 0){ //Verifica se o usuário enviou um arquivo
              $nome_foto_nova = moverFoto($arquivo_foto);
              if($nome_foto_nova == '0'){//se o arquivo que ele enviou der um erro, então não atualiza nada
                 mensagem("A sua foto não foi atualizada pois pode ter dado erro no upload, tipo, ou seu arquivo é maior que 5Mb!","danger");
              }else{ //Se ocorreu tudo certo, então a foto anterior é apagada da pasta img e entã atualizada no banco de dados
                excluiImagem($nome_foto);
                $sql = "UPDATE pessoa SET foto = '$nome_foto_nova' WHERE cod_pessoa = '$id'";
                mysqli_query($conexao,$sql);
                $nome_foto = $nome_foto_nova;
                mensagem("A sua foto foi atualizada com sucesso!","success");
             }
                
            }
            
            
              
            
           $sql = "UPDATE pessoa set `nome` = '$nome', `endereco` = '$endereco', `telefone` = '$telefone', `email` = '$email', `data_nascimento` = '$data_nascimento' WHERE cod_pessoa = $id";

            if(mysqli_query($conexao, $sql)){
             
              echo "<img class='mostra_foto' src='../img/".verificaImagem($nome_foto)."' title='$nome_foto'>";
               mensagem("$nome alterado com sucesso","success");
            }else{
                mensagem("$nome não foi alterado","danger");
            }//mandar para o bando de dados, retorna se deu certo ou nãõ

           
           ?>
           <a href="./pesquisa.php" class="btn btn-primary">Voltar</a>
        </div>
   </div>
   
   <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/scripts.php";?>
   
   

  </body>
</html>
