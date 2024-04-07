<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alteração de cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
</head>
  <body style="background-color: #FFF7FC;">
  <?php 
    include "./conexao.php";
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM pessoa WHERE cod_pessoa = $id";
    $dados = mysqli_query($conexao,$sql);
    $linha = mysqli_fetch_assoc($dados);
  ?>
  <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>

    <div class="container">
        <div class="row">
            <div class="coluna">
                <h1>Cadastro</h1>
                <form action="edit_script.php" method="POST">
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
                      <input type="submit" class="btn btn-success" value="Salvar Alterações">
                      <input type="hidden" name="id" value = "<?php echo $linha['cod_pessoa'];
                      ?>">
                    </div>
                </form>
            </div>        
        </div>
   </div>
   
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>
