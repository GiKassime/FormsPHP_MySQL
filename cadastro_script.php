<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmação</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/style.css" >
  </head>
  <body style="background-color: #FFF7FC;">
    <div class="container">
        <div class="row">
           <?php 
            include "./conexao.php";
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $data_nascimento = $_POST['data_nascimento'];
            $arquivo_foto = $_FILES['foto']; 
            $nome_foto = moverFoto($arquivo_foto);
            $sql = "INSERT INTO `pessoa`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `foto`) VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento','$nome_foto')";
            if(mysqli_query($conexao, $sql)){
              echo "<img class='mostra_foto' src='img/$nome_foto' title='$nome_foto'>";
               mensagem("$nome cadastrado com sucesso","success");
            }else{
                mensagem("$nome não foi cadastrado","danger");
            }//mandar para o bando de dados, retorna se deu certo ou nãõ

           
           ?>
           <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
        </div>
   </div>
   
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>
