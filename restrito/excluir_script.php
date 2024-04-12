
<!doctype html>
<html lang="pt-br">
  <?php include_once './partials/head.php';?>
  
  <body style="background-color: #FFF7FC;">
    <div class="container">
        <div class="row">
           <?php 
            include_once "./conexao.php";
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $foto = mysqli_fetch_assoc(mysqli_query($conexao,"SELECT foto FROM pessoa WHERE cod_pessoa = $id"))['foto'];
            $sql = "DELETE FROM pessoa WHERE cod_pessoa = $id";

            if(mysqli_query($conexao, $sql)){
                  excluiImagem($foto);
               mensagem("$nome excluído com sucesso","success");
            }else{
                mensagem("$nome não foi excluído","danger");
            }//verifica a conexão c banco de dados e retorna se excluiu ou não

           
           ?>
           <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
        </div>
   </div>
   
   <?php include_once './partials/scripts.php';?>
   

  </body>
</html>
