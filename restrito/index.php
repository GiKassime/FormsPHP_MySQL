<!doctype html>
<html lang="pt-br">
  <?php include_once './partials/head.php';?>
  <body style="background-color: #FFF7FC;">
  <?php include_once './partials/nav.php'?>

    <div class="container">
        <div class="row  w-100 p-3 d-flex flex-column text-center  justify-content-center" style="margin:1%;">
            <div class="col">
            <h1  style="font-size:calc(1.73vw + 48.74px);">Cadastro Web</h1>
             <p style="margin-bottom:2%; font-size:calc(0.4vw + 30px);">Este é um sistema simplificado para cadastros. Base de estudos para criação de sistemas Web com PHP e MySQL.</p>
             <p>Bem vindo <strong><?php echo $_SESSION["login_user"];?></p></strong>
            </div>
            <div >
                 <a style="font-size:calc(0.6vw + 20px);" href="./cadastro.php" class="btn btn-primary">Cadastrar</a>
                 <a  style="font-size:calc(0.6vw + 20px);" href="./pesquisa.php" class="btn btn-info text-white">Pesquisar</a>
                 <!-- Botão de sair que abre o modal de confirmação -->
                 <button style="font-size:calc(0.6vw + 20px);" class="btn btn-danger text-white" data-toggle="modal" data-target="#confirmModal">Sair</button>
             </div>
        </div>    
    </div>

    <!-- Modal de confirmação de saída -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Saída</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja sair?
                </div>
                <div class="modal-footer">
                    <!-- Botão para cancelar -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <!-- Botão para confirmar o logout -->
                    <a href="../logout.php" class="btn btn-danger">Sair</a>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('logoutConfirmButton').addEventListener('click', function() {
        // Destrói a sessão e redireciona para index.php
        window.location.href = "../logout.php";
    });
</script>
    <?php include_once './partials/scripts.php';?>
  </body>
</html>