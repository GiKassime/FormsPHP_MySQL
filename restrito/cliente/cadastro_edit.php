<!doctype html>
<html lang="pt-br">
<?php include_once$_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/head.php";?>
  
  
  <body >
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/nav.php";?>

  <?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/conexao.php";
    
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM pessoa WHERE cod_pessoa = $id";
    $dados = mysqli_query($conexao,$sql);
    $linha = mysqli_fetch_assoc($dados);
    $linha['foto'] = verificaImagem($linha['foto']);
  ?>
  <a href="./index.php" class="btn btn-primary">Voltar</a>

    <div class="container">
        <div class="row">
            <div class="coluna">
                <h1>Cadastro</h1>
                <form action="./edit_script.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome" >Nome Completo</label>
                        <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome'];?>">

                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="<?php echo $linha['endereco'];?>">

                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone"
                        value="<?php echo $linha['telefone'];?>">

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email"
                        value="<?php echo $linha['email'];?>">

                    </div>
                    <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" value="<?php echo $linha['data_nascimento'];?>">
                    </div>
                    <div class="form-group">
                      <label for="foto"><img src="../img/<?php echo $linha['foto'];?>" class="mostra_foto">Foto</label>
                        <input type="file" class="form-control" name="foto" accept="image/*">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-success" value="Salvar Alterações">
                      <input type="hidden" name="id" value = "<?php echo $linha['cod_pessoa'];
                      ?>">
                    </div>
                </form>
            </div>        
        </div>
   </div>
   
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/scripts.php";?>
    
   

  </body>
</html>
