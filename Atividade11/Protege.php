<?php
    require_once('Cabecalho.php'); // open session_start ()
    if(isset($_SESSION["email"])==false) {
        $_SESSION["ErroLogin"] = "Email ou Senha com erro." ;
        header("location: FormLogin.php");
    }

?>