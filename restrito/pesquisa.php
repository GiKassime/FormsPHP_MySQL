

<!doctype html>
<html lang="pt-br">
  <?php include_once './partials/head.php';?>
  
  <body style="background-color: #FFF7FC;">
  <?php include_once './partials/nav.php'?>

  <?php 
  
        $pesquisa = $_POST['busca'] ?? '' ;
   
    include_once "conexao.php";
    $sql = "SELECT * FROM pessoa WHERE nome LIKE  '%$pesquisa%'";
    $dados = mysqli_query($conexao,$sql);
   
  ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar</h1>
            <nav class="navbar navbar-light bg-light">
                 <form class="form-inline" action="pesquisa.php" method="POST">
                 <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Pesquisar" name="busca" autofocus>
                 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
             </form>
            </nav>
                        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">Telefone</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Email</th>
                <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php 
                    while($linha = mysqli_fetch_assoc($dados)) {
                        $cod_pessoa = $linha['cod_pessoa'];
                        $nome = $linha['nome'];
                        $endereco = $linha['endereco'];
                        $telefone = $linha['telefone'];
                        $email = $linha['email'];
                        $data_de_nascimento = mostraData($linha['data_nascimento']);
                        $foto = verificaImagem($linha['foto']);
                        
                        echo
                        "<tr>
                        <td ><img src='img/$foto' class='lista_foto'></td>
                        <th scope='row'>$nome</th>
                        <td>$endereco</td>
                        <td>$telefone</td>
                        <td>$email</td>
                        <td>$data_de_nascimento</td>
                        <td><a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-success btn-sm'>Editar</a>
                        <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma'onclick=".'"'."pegar_dados($cod_pessoa, '$nome')".'"'.">Excluir </a></td>
                        </tr>";
                    }
                
                ?>
                
            </tbody>
            </table>
            <a href="./index.php" class="btn btn-primary">Voltar</a>
            </div>        
        </div>
   </div>
   <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de Exclusão</h1>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="excluir_script.php" method="POST">
             <p>Deseja excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>
             
                <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                     <input type="hidden" name="id" id="cod_pessoa">
                     <input type="hidden" name="nome" id="nome_pessoa1">
                      <input type="submit" class="btn btn-danger" value="Sim">
                 </div>
        </form>
      </div>
        
    </div>
  </div>
</div>
    <script>
        function pegar_dados(id,nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('cod_pessoa').value = id;
            document.getElementById('nome_pessoa1').value = nome;
            document.getElementById('nome_pessoa1').value = foto;

        }
    </script>
   <?php include_once './partials/scripts.php';?>
   

  </body>
</html>
