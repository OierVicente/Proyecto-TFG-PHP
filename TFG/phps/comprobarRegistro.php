<?php
session_start();
include_once "./../phps/funciones.php";

if (isset($_POST["btnRegistrarse"])) {
    if (isset($_POST["usuar"]) && isset($_POST["contr"]) && isset($_POST["email"])) {

        $usuario = strip_tags($_POST["usuar"]);
        $password = strip_tags($_POST["contr"]);
        $email = strip_tags($_POST["email"]);


        if(!empty($usuario) && !empty($password) && !empty($email)){

            //include_once ('funciones.php');
            // Conectamos con la base de datos
            $conn = ConexionBD();
            //$conn = mysqli_connect ("localhost", "id16881704_oieruserbd", "]n~VDSZ7v=}x/3y>", "id16881704_tiendabd");
        
            if (! $conn) {
                echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
                exit();
            }

            $sql = "INSERT INTO usuarios(nombreUsuario, contrasenaUsuario, emailUsuario,rolUsuario) VALUES ('" . $usuario . "','" . $password . "','" . $email . "',1)";

            if (mysqli_query($conn,$sql)) {

                $_SESSION["idUsuario"] = mysqli_insert_id($conn);
                $_SESSION["nombreUsuario"] = $usuario;
                $_SESSION["contrasenaUsuario"] = $password;
                $_SESSION["rolUsuario"] = 1;

                header("location: ./../index.php");
            }
            else{
                   header("location: ./../paginas/registrarse.php");
            }

            mysqli_close($conn);

        }
    }

}else{
    header("HTTP/1.0 404 Not Found");
    /* Asegurándonos de que el código interior no será ejecutado cuando se realiza la redirección. */
exit;
}

?>