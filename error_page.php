<!DOCTYPE html>
<html lang="pt-br">
<head>
   
    <title>Erro de Conexão</title>
    <?php include_once './restrito/partials/head.php';?>

</head>
<body>
   
    <div class="container">
        <div class="error-message bg-light p-4 rounded">
            <h2 class="text-danger">Ops, ocorreu um erro!</h2>
            <p class="text-muted"><?php echo isset($_SESSION["mensagem_bdd"]) ? $_SESSION["mensagem_bdd"] : ''; ?></p>
            <button class="btn btn-primary" onclick="window.location.href = 'logout.php';">Voltar para a página inicial</button>
        </div>
    </div>
    <?php include_once './restrito/partials/scripts.php';?>
</body>
</html>
