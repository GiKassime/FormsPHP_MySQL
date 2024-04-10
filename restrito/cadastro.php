
<!doctype html>
<html lang="pt-br">
<?php include_once './partials/head.php';?>
  
  <body style="background-color: #FFF7FC;">
  <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>

    <div class="container">
        <div class="row">
            <div class="coluna">
                <h1>Cadastro</h1>
                <form action="cadastro_script.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome" >Nome Completo</label>
                        <input type="text" class="form-control" name="nome" required>

                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" name="endereco">

                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone">

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">

                    </div>
                    <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" accept="image/*">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>        
        </div>
   </div>
   
   <?php include_once './partials/scripts.php';?>
   

  </body>
</html>
