<!doctype html>
<html lang="pt-br">
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/head.php";?>
  
  <body style="background-color: #FFF7FC;">
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/nav.php";?>

  <?php 
   include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/conexao.php";
    
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
    $dados = mysqli_query($conexao,$sql);
    $linha = mysqli_fetch_assoc($dados);
    $linha['foto'] = verificaImagem($linha['foto']);
  ?>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/FormsPHP_MySQL/restrito/partials/scripts.php";?>
  <div class="container">
        <div class="row  w-100 p-3 d-flex flex-column text-center  justify-content-center" style="margin:1%;">
            <div class="col">
            </div>
            <?php 
                    
                        $id_usuario = $linha['id_usuario'];
                        $login_user = $linha['login_user'];
                        $nome = $linha['nome'];
                        $email = $linha['email'];
                        $foto = verificaImagem($linha['foto']);
                        
                        echo
                        "
                        <a><img src='../img/$foto' class='lista_foto'></a>
                        <p>LOGIN $login_user</p>
                        <p>NOME $nome</p>
                        <p>EMAIL $email</p>
                        <p><a href='edit_usuario.php?id=$id_usuario' class='btn btn-success'>Editar</a>
                        <a href='#' class='btn btn-danger' data-toggle='modal' data-target='#confirma'onclick=".'"'."pegar_dados($id_usuario, '$login_user')".'"'.">Excluir </a></p>
                       ";
                    
                
                ?>
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

   </body>
 </html>