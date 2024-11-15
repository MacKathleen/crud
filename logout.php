<?php 
    setcookie("usuario_logado", "", time()-3600,"/");
    header("LOCATION:login.php");
    exit;
?>