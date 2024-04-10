
<!doctype html>
<html lang="pt-br">
  <?php include_once './partials/head.php';?>
  
  <body style="background-color: #FFF7FC;">
    <div class="container">
        <div class="row">
           <?php 
            include "./conexao.php";
            $id = $_POST['id'];
            $nome = $_POST['nome'];
           $sql = "DELETE FROM pessoa WHERE cod_pessoa = $id";

            if(mysqli_query($conexao, $sql)){
               mensagem("$nome excluído com sucesso","success");
            }else{
                mensagem("$nome não foi excluído","danger");
            }//mandar para o bando de dados, retorna se excluiu ou não

           
           ?>
           <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
        </div>
   </div>
   
   <?php include_once './partials/scripts.php';?>
   

  </body>
</html>
