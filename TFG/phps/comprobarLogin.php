<?php
session_start();
include_once "./../phps/funciones.php";

if (isset($_POST["btnLogearse"])) {
    if (isset($_POST["usuar"]) && isset($_POST["contr"])) {

        $usuario = strip_tags($_POST["usuar"]);
        $password = strip_tags($_POST["contr"]);

        $usuarioCorrecto = false;

        if(!empty($usuario) && !empty($password)){

            //include_once ('funciones.php');
            // Conectamos con la base de datos
            $conn = ConexionBD();
            //$conn = mysqli_connect ("localhost", "id16881704_oieruserbd", "]n~VDSZ7v=}x/3y>", "id16881704_tiendabd");
        
            if (! $conn) {
                echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
                exit();
            }

            $sql = "SELECT * FROM usuarios ";

            if ($result = mysqli_query($conn, $sql)) {

                if (mysqli_num_rows($result) > 0) {

                    while ($fila = mysqli_fetch_assoc($result)) {
                        if ($usuario == $fila["nombreUsuario"] && $password == $fila["contrasenaUsuario"]) {
                            
                            $_SESSION["idUsuario"] = $fila["idUsuario"];
                            $_SESSION["nombreUsuario"] = $fila["nombreUsuario"];
                            $_SESSION["contrasenaUsuario"] = $fila["contrasenaUsuario"];
                            $_SESSION["rolUsuario"] = $fila["rolUsuario"];

                            $usuarioCorrecto = true;

                            header("location: ./../index.php");
                        }
                    }
                } else{
                    
                }if($usuarioCorrecto == false) {
                    header("location: ./../paginas/login.php");
                }
            }
            mysqli_close($conn);

        }
    }

}else{
    header("HTTP/1.0 500 Internal Server Error");
    /* Asegurándonos de que el código interior no será ejecutado cuando se realiza la redirección. */
exit;
}

?>