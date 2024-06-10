<!doctype html>
<html lang="pt-br">
  <?php include_once './partials/head.php';?>
  <body>
  <?php include_once './partials/nav.php'?>

    <div class="container">
        <div class="row  w-100 p-3 d-flex flex-column text-center  justify-content-center" style="margin:1%;">
            <div class="col">
            <h1  style="font-size:calc(1.73vw + 48.74px);">Cadastro Web</h1>
             <p style="margin-bottom:2%; font-size:calc(0.4vw + 30px);">Este é um sistema simplificado para cadastros. Base de estudos para criação de sistemas Web com PHP e MySQL.</p>
             <p>Bem vindo <strong><?php echo $_SESSION["login_user"];?></p></strong>
            </div>
            <div >
                 <a style="font-size:calc(0.6vw + 20px);" href="http://localhost/FormsPHP_MySQL/restrito/cliente/index.php" class="btn btn-primary">Área Cliente</a>
                 <a  style="font-size:calc(0.6vw + 20px);" 
                 href="http://localhost/FormsPHP_MySQL/restrito/usuario/index.php" class="btn btn-info text-white">Área Usuário</a>
            
                
                
             </div>
        </div>    
    </div>

 
   
    <?php include_once './partials/scripts.php';?>
  </body>
</html>