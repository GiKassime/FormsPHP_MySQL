<!doctype html>
<html lang="pt-br">
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/head.php";?>
  
  <body >
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/nav.php";?>

  <?php 
   include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/conexao.php";
    
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
    $dados = mysqli_query($conexao,$sql);
    $linha = mysqli_fetch_assoc($dados);
    $linha['foto'] = verificaImagem($linha['foto']);
  ?>
  <a href="./index.php" class="btn btn-primary">Voltar</a>

    <div class="container">
        <div class="row">
            <div class="coluna">
                <h1>Editar Usuário</h1>
                <form action="./edit_usuario_script.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome" >Login User</label>
                        <input type="text" class="form-control" name="login_user" required value="<?php echo $linha['login_user'];?>">

                    </div>
                    <div class="form-group">
                        <label for="endereco">Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $linha['nome'];?>">

                    </div>
                    <div class="form-group">
                         <label for="email">Email</label>
                          <input type="email" class="form-control" name="email" id="email" value="<?php echo $linha['email'];?>">
                          <span id="emailError" style="color: red;"></span>
                    </div>
                    <div class="form-group">
                      <label for="foto"><img src="../img/<?php echo $linha['foto'];?>" class="mostra_foto">Foto</label>
                        <input type="file" class="form-control" name="foto" accept="image/*">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-success" value="Salvar Alterações">
                      <input type="hidden" name="id" value = "<?php echo $linha['id_usuario'];
                      ?>">
                    </div>
                </form>
            </div>        
        </div>
   </div>


   <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/scripts.php";?>
   

  </body>
</html>
