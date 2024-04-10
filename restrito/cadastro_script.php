
<!doctype html>
<html lang="pt-br">
<?php include_once './partials/head.php';?>
  
  <body style="background-color: #FFF7FC;">
    <div class="container">
        <div class="row">
           <?php 
            include "./conexao.php";
            $nome = clear($conexao,$_POST['nome']);
            $endereco = clear($conexao, $_POST['endereco']);
            $telefone = clear($conexao,$_POST['telefone']);
            $email = clear($conexao, $_POST['email']);
            $data_nascimento = clear($conexao,$_POST['data_nascimento']);
            $arquivo_foto = $_FILES['foto']; 
            $nome_foto = moverFoto($arquivo_foto);
            $sql = "INSERT INTO `pessoa`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `foto`) VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento','$nome_foto')";
            if(mysqli_query($conexao, $sql)){
              
              if($nome_foto == '0'){
                mensagem("A sua foto pode ter dado erro no upload, tipo, ou seu arquivo é maior que 5Mb","danger");
              }
              if($nome_foto == null){
                mensagem("$nome não adicionou nenhuma foto!","danger");
              }
              $nome_foto = verificaImagem($nome_foto);
              echo "<img class='mostra_foto' src='img/$nome_foto' title='$nome_foto'>";
              
             
               mensagem("$nome cadastrado com sucesso","success");
            }else{
                mensagem("$nome não foi cadastrado","danger");
            }//mandar para o bando de dados, retorna se deu certo ou nãõ

           
           ?>
           <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
        </div>
   </div>
   
   <?php include_once './partials/scripts.php';?>
  

  </body>
</html>
