<?php 
    session_start();
    if (isset($_SESSION['login_user'])) {
       $user = $_SESSION['login_user'];
    }else{
        session_destroy();
        header("location: ../index.php?msg=Você foi expulso");
    }

?>