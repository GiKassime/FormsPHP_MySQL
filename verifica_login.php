<?php
require_once "./restrito/conexao.php";

          if (isset($_POST['login'])) {
              $login = mysqli_real_escape_string($conexao, $_POST['login']);
              
              $sql = "SELECT * FROM usuarios WHERE  login_user = '$login'";
              $result = mysqli_query($conexao, $sql);

              if (mysqli_num_rows($result) > 0) {
                  echo json_encode(["status" => "error", "message" => "Login já existe. Escolha outro."]);
              } else {
                  echo json_encode(["status" => "success"]);
              }
          }
          ?>
