<?php
session_start();

if(isset($_GET['cerrarSesion'])) {

    //Vaciamos y destruimos las variables de sesión
    $_SESSION["idUsuario"] = NULL;
    $_SESSION["nombreUsuario"] = NULL;
    $_SESSION["contrasenaUsuario"] = NULL;
    $_SESSION["rolUsuario"] = NULL;

    unset($_SESSION['idUsuario']);
    unset($_SESSION['nombreUsuario']);
    unset($_SESSION['contrasenaUsuario']);
    unset($_SESSION['rolUsuario']);
    
    //Redireccionamos a la pagina index.php
    header("Location: ./../index.php");
  }


?>