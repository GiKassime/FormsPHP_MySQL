
<!doctype html>
<html lang="pt-br">
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/head.php";?>
  
  <body style="background-color: #FFF7FC;">
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/nav.php";?>

    <div class="container">
        <div class="row">
           <?php 
            include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/conexao.php";
            $id = $_POST['id'];
            $nome = $_POST['nome'];
           $foto = mysqli_fetch_assoc(mysqli_query($conexao,"SELECT foto FROM usuarios WHERE id_usuario = $id"))['foto'?? ''];
            $sql = "DELETE FROM usuarios WHERE id_usuario = $id";

            if(mysqli_query($conexao, $sql)){
               excluiImagem($foto);
               mensagem("$nome excluído com sucesso","success");
               if($_SESSION['id'] == $id){
                  header('Location: ../../logout.php');
               }
            }else{
                mensagem("$nome não foi excluído","danger");
            }//verifica a conexão c banco de dados e retorna se excluiu ou não

           
           ?>
           <a href="./pesquisa_usuario.php" class="btn btn-primary">Voltar</a>
        </div>
   </div>
   
   <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/scripts.php";?>
   

  </body>
</html>
