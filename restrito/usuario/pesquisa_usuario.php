

<!doctype html>
<html lang="pt-br">
<?php 

 
include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/head.php";
if($_SESSION['login_user'] != 'ADMIN'){
     echo "<script>
     confirm('Seu usuario não tem permissão para acessar essa página!!!');
     window.location.href = 'http://localhost/FormsPHP_MySQL/restrito/index.php'; // Redireciona para a página home
 
 </script>";
 
 }?>
  
  <body>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/nav.php";?>

  <?php 
  
        $pesquisa = $_POST['busca_user'] ?? '' ;
   
        include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/conexao.php";
        $sql = "SELECT * FROM usuarios WHERE login_user LIKE  '%$pesquisa%'";
       $dados = mysqli_query($conexao,$sql);
   
  ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar Usuário</h1>
            <nav class="navbar navbar-light bg-light">
                 <form class="form-inline" action="pesquisa_usuario.php" method="POST">
                 <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Pesquisar" name="busca_user" autofocus>
                 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
             </form>
            </nav>
                        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Foto User</th>
                <th scope="col">Login User</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php 
                    while($linha = mysqli_fetch_assoc($dados)) {
                        $id_usuario = $linha['id_usuario'];
                        $login_user = $linha['login_user'];
                        $nome = $linha['nome'];
                        $email = $linha['email'];
                        $foto = verificaImagem($linha['foto']);
                        
                        echo
                        "<tr>
                        <td ><img src='../img/$foto' class='lista_foto'></td>
                        <th scope='row'>$login_user</th>
                        <td>$nome</td>
                        <td>$email</td>
                        <td><a href='edit_usuario.php?id=$id_usuario' class='btn btn-success btn-sm'>Editar</a>
                        <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma'onclick=".'"'."pegar_dados($id_usuario, '$login_user')".'"'.">Excluir </a></td>
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
        <form action="excluir_script_user.php" method="POST">
             <p>Deseja excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>
             
                <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                     <input type="hidden" name="id" id="id_usuario">
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
            document.getElementById('id_usuario').value = id;
            document.getElementById('nome_pessoa1').value = nome;
            document.getElementById('nome_pessoa1').value = foto;

        }
    </script>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/scripts.php";?>
   

  </body>
</html>
