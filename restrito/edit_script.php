
<?php include "../validar.php";?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alteração de Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
  </head>
  <body style="background-color: #FFF7FC;">
    <div class="container">
        <div class="row">
           <?php 
            include "./conexao.php";
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
                if(file_exists("img/".$nome_foto)){
  
                   unlink("img/".$nome_foto);
                }
                $sql = "UPDATE pessoa SET foto = '$nome_foto_nova' WHERE cod_pessoa = '$id'";
                mysqli_query($conexao,$sql);
                $nome_foto = $nome_foto_nova;
                mensagem("A sua foto foi atualizada com sucesso!","success");
             }
                
            }
            
            
              
            
           $sql = "UPDATE pessoa set `nome` = '$nome', `endereco` = '$endereco', `telefone` = '$telefone', `email` = '$email', `data_nascimento` = '$data_nascimento' WHERE cod_pessoa = $id";

            if(mysqli_query($conexao, $sql)){
             
              echo "<img class='mostra_foto' src='img/".verificaImagem($nome_foto)."' title='$nome_foto'>";
               mensagem("$nome alterado com sucesso","success");
            }else{
                mensagem("$nome não foi alterado","danger");
            }//mandar para o bando de dados, retorna se deu certo ou nãõ

           
           ?>
           <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
        </div>
   </div>
   
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>
